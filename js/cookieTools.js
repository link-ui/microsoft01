
//保存cookie
//参数：
//键
//值
//有效期（单位是：天）
//返回值：无 

function saveCookie(key,value,dayCount){
	var d = new Date();
	d.setDate(d.getDate()+dayCount);
	document.cookie = key+'='+escape(value)+';expires='+d.toGMTString();
}

//获取cookie(根据键获取值)
//参数:
//键
//返回值：值

function getCookie(key){
	var str = unescape(document.cookie);//username=jzm; userpass=1236667
	//1、分割成数组（; ）
	var  arr = str.split('; ');//['username=jzm','userpass=1236667']

	//2、从数组查找key=;
	for(var i in arr){
		if(arr[i].indexOf(key+'=')==0){
			return arr[i].split('=')[1];
		}
	}
	return null;
}

//删除cookie
//参数：
//键
//返回值：无
function removeCookie(key){
	saveCookie(key,'',-1);
}
