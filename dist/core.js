function myAjax(myUrl , myData , myDataType , myMethod){
	myDataType = typeof myDataType === 'undefined' ? "JSON" : myDataType;
	myMethod 	= typeof myMethod === 'undefined' ? "POST" : myMethod;
	return $.ajax({
		method 	: myMethod,
		url 	: myUrl,
		data 	: myData,
		dataType: myDataType,
		cache 	: false
	});
}