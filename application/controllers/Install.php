<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Install extends Front{
	function __construct(){
		parent::__construct();
		$this->load->model('PostModel');
	}
	function index(){
		// echo form_open();
		// echo "Password";
		// echo form_input(array('name'=>'pass' , 'type'=>'text'));
		// echo form_submit('submit' , 'submit');
		// echo form_close();
		$this->load->view('install');
	}
	function do_install(){
		if($this->_post('pass') != 'a'){
			echo "Pass salah";
			return false;
		}
		$this->install_page();
		$this->install_menu();

	}
	function do_uninstall(){

	}
	private function install_page(){
		$post_type='page';
		$contentHome = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas iure esse deserunt officia fugit blanditiis necessitatibus id animi, nemo provident ullam asperiores reprehenderit laborum, facilis! Quod et vel repudiandae expedita.';
		$contentAboutUs = "Woodside Capital (WCIFX) is a financial services company, that enables both private persons and other companies to trade on the foreign exchange market or Forex. Our brokerage company was established in 2010 and our goal is to provide the newest technological solutions, which enable to take our clients' transactions straight to the exchange in realtime and transparancy. Our partners include large banks and funds, Also Prime Brokers whose liquidity is available to our clients. We use STP technology, which enables us to offer the best terms of trade to our clients, without any intervention from a dealer, thus ruling out the human factor.
We have great experience in the field of interactive trading and we offer only the best solutions to our clients. It is very important to us, that our clients feel comfortable and safe in our environment. That is why our team of professionals is available round the clock, five days a week.";
		$parallaxDescAboutUs = "Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum. Fusce blandit ultrices sapien, in accumsan orci rhoncus eu.";
		$contentRealAccount = "The demo account is a free account for learning, that enables you to get acquainted with the terms of trade and put your trading skills to the test. If you're taking your first steps in the world of finance and have decided to learn how to trade, the demo account is the perfect tool for learning your first lessons, using virtual money and taking no risks.";
		$contentDemoAccount = "The demo account is a free account for learning, that enables you to get acquainted with the terms of trade and put your trading skills to the test. If you're taking your first steps in the world of finance and have decided to learn how to trade, the demo account is the perfect tool for learning your first lessons, using virtual money and taking no risks.";
		$contentTradingInstrument = "Below is a list of trading instruments with some parameters and conditions for each. The displayed spreads are consistent with the MarketPro trading account and are transmitted in real time with practically no delays.";
		$parallaxDescTradingInstrument = "Here you will find an overview of the Forex trading instruments available to our clients. We offer our clients access to the Forex market, as well as opportunities to trade gold and silver. This list is constantly complemented in order to improve the terms of trade.";
		$contentPaymentMethod = "Both Euros and Dollars can be transfered to the trading account by using different payment solutions provided by our company. Once any financial resources are transfered to the trading account, it will immediately become active. The currency you transfered to the account may differ from the base currency of the account. In such cases, our financial department converts the transfered funds using the exchange rate of the central bank and transfers the resources to your account according to the base currency you have chosen.";
		$parallaxInvestmentProgram1 = "<h2>Earn using the experience of others!</h2>
<p>Automatically copy transactions made by professional traders to your account. Use the experience, that others have spent years to obtain.</p>";
		$contentContest = "<div class=\"row\">
          <div class=\"col-md-6\">
            <h4 class=\"contest__headline\">About forex <b>contest</b></h4>
            <p>We announce traders’ contest for all who want to take part and to gain prizes. We have reduced the duration of the contest to 5 working days aiming to reveal winners and to make trading more dynamic. All participants get 10 000USD on their demo accounts as initial deposit to compete without risking their money. To participate in the contest, one has to invest 5USD to prize fund. Adamant Finance adds 30% of the total amount to the prize fund.</p>
          </div>
          <div class=\"col-md-6\">
            <h4 class=\"contest__headline\">Real Prize for <b>virtual account!</b></h4>
            <p>The terms of the contest are easy. All money a trader wins is his property that he may dispose on his own without any additional withdrawal requirements.</p>
          </div>
        </div>";
        $parallaxContest = "<ul class=\"list-unstyled\">
                <li>Unlimited withdrawals</li>
                <li>Duration: 5 days</li>
                <li>10 prizes</li>
                <li>Participation fee: 5USD</li>
              </ul>";
        $contentPartner = "Woodside Capital Partnership give you individual or Co-prorate the opportunity to earn the most lucrative commissions and Forex rebates in the forex industry. Increase your profitability by referring Forex traders and increase your revenue as Partner. Enjoy instant payouts, receive personalized client support and industry leading IT solutions to increase your profitability.

Each time your client performs a trade, you get a certain fixed amount per lot traded. Kindly refer the below the Rebate structure and calculation income for client that opening account and trade under your referral partner program";
		$parallaxPartnership = "The partnership programme is convenient and doesn't require any financial investments. All you have to do is place our advertisement on your homepage, blog, forum, or display it in social media.";

		$data[] = array(
					'title'		=> 'Home',
					'content' 	=> $contentHome,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image' 	   	=> 'slide-home-bg2.jpg',
									'parallax_title' 		=> '',
									'parallax_description' 	=> '',
									'page_template'			=> ''
								)
				);
		$data[] = array(
					'title'		=> 'About Us',
					'content'	=> $contentAboutUs,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-about.jpg',
									'parallax_title'		=> 'About The Company',
									'parallax_description'	=> $parallaxDescAboutUs,
									'page_template'			=> 'about'
								)
				);
		$data[] = array(
					'title'		=> 'Real Account',
					'content'	=> $contentRealAccount,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-trading-02.jpg',
									'parallax_title'		=> '',
									'parallax_description'	=> '',
									'page_template'			=> 'trading-real-account'
								)
				);
		$data[] = array(
					'title'		=> 'Demo Account',
					'content'	=> $contentDemoAccount,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-trading-01.jpg',
									'parallax_title'		=> '',
									'parallax_description'	=> '',
									'page_template'			=> 'trading-demo-account'
								)
				);
		$data[] = array(
					'title'		=> 'Trading Instrument',
					'content'	=> $contentTradingInstrument,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-trading-03.jpg',
									'parallax_title'		=> 'Trading instrument',
									'parallax_description'	=> $parallaxDescTradingInstrument,
									'page_template'			=> 'trading-instruments'
								)
				);
		$data[] = array(
					'title'		=> 'Trading Platform',
					'content'	=> $contentTradingInstrument,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-trading-05.jpg',
									'parallax_title'		=> 'Trading instrument',
									'parallax_description'	=> $parallaxDescTradingInstrument,
									'page_template'			=> 'trading-platforms'
								)
				);
		$data[] = array(
					'title'		=> 'Payment Method',
					'content'	=> $contentPaymentMethod,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-trading-04.jpg',
									'parallax_title'		=> 'Trading instrument',
									'parallax_description'	=> $parallaxDescTradingInstrument,
									'page_template'			=> 'trading-payment'
								)
				);
		$data[] = array(
					'title'		=> 'Investment Program #1',
					'content'	=> '',
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-investment.jpg',
									'parallax_title'		=> 'Automatic trading on the Forex market',
									'parallax_description'	=> $parallaxInvestmentProgram1,
									'page_template'			=> 'investment-program-01'
								)
				);
		$data[] = array(
					'title'		=> 'Investment Program #2',
					'content'	=> '',
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-investment-03.jpg',
									'parallax_title'		=> 'Automatic trading on the Forex market',
									'parallax_description'	=> '',
									'page_template'			=> 'investment-program-02'
								)
				);
		$data[] = array(
					'title'		=> 'Contest',
					'content'	=> $contentContest,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-contest.jpg',
									'parallax_title'		=> 'Weekly traders’ contest on demo account!',
									'parallax_description'	=> $parallaxContest,
									'page_template'			=> 'contest'
								)
				);
		$data[] = array(
					'title'		=> 'Partner',
					'content'	=> $contentPartner,
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> 'bg-partnership.jpg',
									'parallax_title'		=> 'Partnership',
									'parallax_description'	=> $parallaxPartnership,
									'page_template'			=> 'partnership'
								)
				);
		$data[] = array(
					'title'		=> 'FORGOT YOUR PASSWORD?',
					'content'	=> 'Enter your email below to receive your password reset instructions',
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> '',
									'parallax_title'		=> '',
									'parallax_description'	=> '',
									'page_template'			=> 'lost-password'
								)
				);
		$data[] = array(
					'title'		=> 'GENERATE NEW PASSWORD',
					'content'	=> '',
					'post_type'	=> $post_type,
					'meta'		=> array(
									'parallax_image'		=> '',
									'parallax_title'		=> '',
									'parallax_description'	=> '',
									'page_template'			=> 'generate-password'
								)
				);
		foreach ($data as $post) {
			$meta = $post['meta'] ; 
			unset($post['meta']);
			$post_id = $this->PostModel->addPost($post_type , $post);
			if($post_id){
				foreach ($meta as $mkey => $mval) {
					$this->PostModel->setPostMeta($post_id , $mkey , $mval);
				}
			}
		}
		// var_dump($data);
	}
	function install_menu(){
		$MenuPrimary = array(
					array(
						'item_id'=> 1,
						'type'	=> 'page',
						'title' => 'Home',
						'object'=> '',
						'parent'=> ''
					),
					array(
						'item_id'=> 2,
						'type'	=> 'page',
						'title' => 'About Us',
						'object'=> 'about-us',
						'parent'=> ''
					),
					array(
						'item_id'=> 3,
						'type'	=> 'page',
						'title' => 'Company Profile',
						'object'=> 'about',
						'parent'=> 2
					),
					array(
						'item_id'=> 4,
						'type'	=> 'page',
						'title' => 'Bussiness',
						'object'=> 'bussiness',
						'parent'=> 2
					),
					array(
						'item_id'=> 5,
						'type'	=> 'page',
						'title' => 'Trading',
						'object'=> '',
						'parent'=> ''
					),
					array(
						'item_id'=> 6,
						'type'	=> 'page',
						'title' => 'Real Account',
						'object'=> 'trading-real-account',
						'parent'=> '5'
					),
					array(
						'item_id'=> 7,
						'type'	=> 'page',
						'title' => 'Demo Account',
						'object'=> 'trading-demo-account',
						'parent'=> '5'
					),
					array(
						'item_id'=> 8,
						'type'	=> 'page',
						'title' => 'Trading-Instruments',
						'object'=> 'trading-instruments',
						'parent'=> '5'
					),
					array(
						'item_id'=> 9,
						'type'	=> 'page',
						'title' => 'Trading-Platform',
						'object'=> 'trading-platforms',
						'parent'=> '5'
					),
					array(
						'item_id'=> 10,
						'type'	=> 'page',
						'title' => 'Trading-Payment',
						'object'=> 'trading-payment',
						'parent'=> '5'
					),
					array(
						'item_id'=> 11,
						'type'	=> 'page',
						'title' => 'Invesment',
						'object'=> '',
						'parent'=> ''
					),
					array(
						'item_id'=> 12,
						'type'	=> 'page',
						'title' => 'Invesment Programe #1',
						'object'=> 'investment-program-01',
						'parent'=> '11'
					),
					array(
						'item_id'=> 13,
						'type'	=> 'page',
						'title' => 'Invesment Programe #2',
						'object'=> 'investment-program-02',
						'parent'=> '11'
					),
					array(
						'item_id'=> 14,
						'type'	=> 'page',
						'title' => 'Contest',
						'object'=> 'contest',
						'parent'=> ''
					),
					array(
						'item_id'=> 15,
						'type'	=> 'page',
						'title' => 'Partner',
						'object'=> 'partnership',
						'parent'=> ''
					),
				);
		$MenuFooter = array(
							array(
								'item_id'=> 1,
								'type'	=> 'page',
								'title' => 'Trade with us',
								'object'=> '',
								'parent'=> ''
							),	
							array(
								'item_id'=> 2,
								'type'	=> 'custom',
								'title' => 'Bonuses and promotions',
								'object'=> '',
								'parent'=> '1'
							),
							array(
								'item_id'=> 3,
								'type'	=> 'custom',
								'title' => 'Depositing/withdrawing',
								'object'=> '',
								'parent'=> '1'
							),
							array(
								'item_id'=> 4,
								'type'	=> 'custom',
								'title' => 'Trading platforms',
								'object'=> '',
								'parent'=> '1'
							),
							array(
								'item_id'=> 5,
								'type'	=> 'custom',
								'title' => 'Types of accounts',
								'object'=> '',
								'parent'=> '1'
							),
							array(
								'item_id'=> 6,
								'type'	=> 'custom',
								'title' => 'Copy signals',
								'object'=> '',
								'parent'=> ''
							),
							array(
								'item_id'=> 7,
								'type'	=> 'custom',
								'title' => 'What is MFX Copy?',
								'object'=> '',
								'parent'=> '6'
							),
							array(
								'item_id'=> 8,
								'type'	=> 'custom',
								'title' => 'Advantages of service',
								'object'=> '',
								'parent'=> '6'
							),
							array(
								'item_id'=> 9,
								'type'	=> 'custom',
								'title' => 'Rating of providers',
								'object'=> '',
								'parent'=> '6'
							),
							array(
								'item_id'=> 10,
								'type'	=> 'custom',
								'title' => 'Invest',
								'object'=> '',
								'parent'=> ''
							),
							array(
								'item_id'=> 11,
								'type'	=> 'custom',
								'title' => 'MFX Capital investments',
								'object'=> '',
								'parent'=> '10'
							),
							array(
								'item_id'=> 12,
								'type'	=> 'custom',
								'title' => 'Advantages of the program',
								'object'=> '',
								'parent'=> '10'
							),
							array(
								'item_id'=> 13,
								'type'	=> 'custom',
								'title' => 'Reports and presentations',
								'object'=> '',
								'parent'=> '10'
							),
							array(
								'item_id'=> 14,
								'type'	=> 'custom',
								'title' => 'PAMM-accounts',
								'object'=> '',
								'parent'=> '10'
							),
							array(
								'item_id'=> 15,
								'type'	=> 'custom',
								'title' => 'Participate in tournaments',
								'object'=> '',
								'parent'=> ''
							),
							array(
								'item_id'=> 16,
								'type'	=> 'custom',
								'title' => 'Competitions timetable',
								'object'=> '',
								'parent'=> '15'
							),
							array(
								'item_id'=> 17,
								'type'	=> 'custom',
								'title' => 'Regular Competitions',
								'object'=> '',
								'parent'=> '15'
							),
							array(
								'item_id'=> 18,
								'type'	=> 'custom',
								'title' => 'Freeroll Competitions',
								'object'=> '',
								'parent'=> '15'
							),
							array(
								'item_id'=> 19,
								'type'	=> 'custom',
								'title' => 'Sit&Go competitions',
								'object'=> '',
								'parent'=> '15'
							),
							array(
								'item_id'=> 20,
								'type'	=> 'custom',
								'title' => 'Become partner',
								'object'=> '',
								'parent'=> ''
							),
							array(
								'item_id'=> 21,
								'type'	=> 'custom',
								'title' => 'Standart program',
								'object'=> '',
								'parent'=> '20'
							),
							array(
								'item_id'=> 22,
								'type'	=> 'custom',
								'title' => 'Multilevel program',
								'object'=> '',
								'parent'=> '20'
							),
							array(
								'item_id'=> 23,
								'type'	=> 'custom',
								'title' => 'CPA program',
								'object'=> '',
								'parent'=> '20'
							),
							array(
								'item_id'=> 24,
								'type'	=> 'custom',
								'title' => 'Materials of engagement',
								'object'=> '',
								'parent'=> '20'
							),
							array(
								'item_id'=> 25,
								'type'	=> 'custom',
								'title' => 'About Company',
								'object'=> '',
								'parent'=> ''
							),
							array(
								'item_id'=> 26,
								'type'	=> 'custom',
								'title' => 'Company history',
								'object'=> '',
								'parent'=> '25'
							),
							array(
								'item_id'=> 27,
								'type'	=> 'custom',
								'title' => 'MFX Broker awards',
								'object'=> '',
								'parent'=> '25'
							),
							array(
								'item_id'=> 28,
								'type'	=> 'custom',
								'title' => 'Social broker',
								'object'=> '',
								'parent'=> '25'
							),
							array(
								'item_id'=> 29,
								'type'	=> 'custom',
								'title' => 'Company licenses',
								'object'=> '',
								'parent'=> '25'
							),
					);
		$this->PostModel->setCore('wcifx_menu_primary' , serialize($MenuPrimary));
		$this->PostModel->setCore('wcifx_menu_footer2' , serialize($MenuFooter));
	}
}	