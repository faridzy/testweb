<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TermModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function getTerms($taxonomy , $limit = null){
        $this->db->select("terms.*");
        $this->db->from("terms");
        $this->db->join("termtaxonomy as tax","tax.taxonomy_id=terms.taxonomy_id");
        $this->db->where("tax.taxonomy" , $taxonomy);
        if($limit != null){
            $this->db->limit($limit);
        }
        return $this->db->get()->result();
    }
    function addTerm($taxonomy,$terms = array()){ //$terms = [name,description,parent,sort_order , slug*optional]
        $defaults = array(
                        'name'      => '',
                        'parent'    => 0,
                        'term_group'=> 0,
                    );
        $getTaxonomy = $this->getTaxonomy($taxonomy );
        if($getTaxonomy != null){
            $taxonomy_id = $getTaxonomy->taxonomy_id;
        }else{
            $taxonomy_id = $this->addTaxonomy($taxonomy);
        }
        $data = array_merge($defaults , $terms);
        $data['taxonomy_id'] = $taxonomy_id;
        $data['slug']        = $this->generateSlugTerm($data['name'] , $taxonomy);
    }
    function updateTerm($term_id , $taxonomy,$terms = array()){ //$terms = [name,description,parent,sort_order]
        $this->db->where("term_id" , $term_id);
    	if($this->db->update("terms" , $dataTerm)){
            return $term_id;
        }
    }
    function deleteTerm($term_id){
        $this->db->delete("terms", array('term_id' => $term_id));
        $this->db->delete("termmeta", array('term_id' => $term_id));
        return true;
    }
    function setTermMeta($term_id , $meta_key , $meta_value){
        $check = $this->getTermMeta($term_id , $meta_key);
        $dataMeta["meta_value"] = $meta_value;
        if($check === false){
            $dataMeta["term_id"]    = $term_id;
            $dataMeta["meta_key"]   = $meta_key;
            $this->db->insert("termmeta" , $dataMeta);
        }else{
            $this->db->where("term_id" , $term_id);
            $this->db->where("meta_key" , $meta_key);
            $this->db->update("termmeta" , $dataMeta);
        }
    }
    function getTermMeta($term_id , $meta_key){
        $this->db->select('meta_key , meta_value');
        $this->db->from('termmeta');
        if(is_array($meta_key)){
            $this->db->where_in('meta_key' , $meta_key );
            $q = $this->db->get()->result();
            if($q != null){
                foreach ($q as $item) {
                    $data[$item->meta_key] = $item->meta_value;
                }
            }
            $meta_key = array_flip($meta_key);
            $meta_key = array_map(function($val){ return false;}, $meta_key); // to reset val to false
            $data   = array_merge($meta_key , $data);
        }else{
            $this->db->where("meta_key" , $meta_key);
            $q = $this->db->get()->row();
            $data = ($q != null) ? $q->meta_value : false;
        }
        return $data;
    }
    function getAllTermRelation($object_id , $taxonomy = '' ){
        $this->db->select("terms.* , tax.taxonomy");
        $this->db->from("termrelation as relation");
        $this->db->join("terms","relation.term_id=terms.term_id");
        $this->db->join("termtaxonomy as tax","tax.taxonomy_id=terms.taxonomy_id");
        if($taxonomy != ''){
            $this->db->where("tax.taxonomy" , $taxonomy);
        }
        $this->db->where("relation.object_id" , $object_id);
        return $this->db->get()->result();
    }
    function setTermRelation($object_id , $term_id , $taxonomy ){ //object id bisa di isi id dari post/product
        $this->clearTermRelation($object_id , $taxonomy );
        if(is_array($term_id)){
            foreach ($term_id as $value) {
                $this->insertTermRelation($object_id , $value);
            }
        }
        if(is_numeric($term_id)){
            $this->insertTermRelation($object_id , $term_id );
        }
    }
    function generateSlugTerm($name , $taxonomy , $old_ID = null){
        if($old_ID != null){
            $getTerm = $this->getTermByID(  $old_ID );
            if($getTerm != null){
                if(strtolower($name) == strtolower($getTerm->name))
                    return $getTerm->slug;
            }
        }
        $slug       = url_title($name , "-" , TRUE);
        $getTerm    = $this->getTermByName($name , $taxonomy);
        $count      = count($getTerm);
        $slug       = ($count > 0) ? $slug."-".($count + 1) : $slug;
        return $slug;
    }
    function getTermByName($name , $taxonomy ){
        return $this->getTermBy( array("terms.name" => $name) , $taxonomy );
    }
    function getTermBySlug($slug , $taxonomy ){
        return $this->getTermBy( array("terms.slug" => $slug) , $taxonomy );
    }
    function getTermByID($ID , $taxonomy=null ){
        return $this->getTermBy( array("terms.term_id" => $ID) , $taxonomy );
    }
    private function insertTermRelation($object_id , $term_id){
        $data['object_id']  = $object_id;
        $data['term_id']    = $term_id;
        $this->db->insert("termrelation" , $data);
    }
    private function clearTermRelation($object_id , $taxonomy){
        $this->db->query("DELETE relation.* from termrelation as relation JOIN terms ON terms.term_id=relation.term_id JOIN termtaxonomy as tax on tax.taxonomy_id=terms.taxonomy_id where relation.object_id = ? AND tax.taxonomy = ? " , array( $object_id , $taxonomy ));
    }
    private function getTaxonomy($taxonomy = ""){
    	$this->db->select("*");
    	$this->db->from("termtaxonomy");
    	$this->db->where("taxonomy" , $taxonomy);
    	return $this->db->get()->row();
    }
    function getTermBy($where = array() , $taxonomy = null){
        $key    = key($where);
        $value  = $where[$key];
    	$this->db->select("terms.* , tax.taxonomy");
    	$this->db->from("terms");
    	$this->db->join("termtaxonomy as tax","tax.taxonomy_id=terms.taxonomy_id");
        $this->db->where( $key , $value );
        if($taxonomy != null){
    	   $this->db->where("tax.taxonomy" , $taxonomy);
        }
    	$q = $this->db->get()->row();
    	return $q;
    }
    private function addTaxonomy($taxonomy){
        $data['taxonomy']   = $taxonomy;
        $this->db->insert("termtaxonomy" , $data);
        return $this->db->insert_id();
    }
}