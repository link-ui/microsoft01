
//功能：正则验证
//参数：
// 需要验证的类型(email:表示邮箱,phone:表示手机号码；cardid:表示身份证)
// 需要验证的字符串
//返回值：true或false

//regExp1809("email","hello");

function regExp1809(type,str){
	switch(type){
		case "email": var reg = /^\w{3,}@\w{2,}\.(com|cn|net|com\.cn)$/i;break;
		case "phone": var reg = /^1[3-9]\d{9}$/i;break;
		case "cardId": var reg = /^[1-9]\d{16}[xX\d]$/i;break;

	}
	// if(reg.test(str)==true){
	// 	return true;
	// }else{
	// 	return false;
	// }
	return reg.test(str);
}