function refresh(){
	location=location;
}
//API提交
function GetApi(url,type,data,success,error,zt){
	$.ajax({
		url:"http://www.seopc.com"+url,
		type:type,
		data:data,
		async:zt,
		dataType:'json',
		success:success,
		error:error
	})
}