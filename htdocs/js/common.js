function addOrUpdateUrlParam(uri, key, value)
{
	// remove the hash part before operating on the uri
    var i = uri.indexOf('#');
	var hash = i === -1 ? ''  : uri.substr(i);
	uri = i === -1 ? uri : uri.substr(0, i);

	var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
	var separator = uri.indexOf('?') !== -1 ? "&" : "?";

	if (!value) {
		// remove key-value pair if value is empty
		uri = uri.replace(new RegExp("([?&]?)" + key + "=[^&]*", "i"), '');
		if (uri.slice(-1) === '?') {
			uri = uri.slice(0, -1);
		}
		// replace first occurrence of & by ? if no ? is present
		if (uri.indexOf('?') === -1) uri = uri.replace(/&/, '?');
	} else if (uri.match(re)) {
		uri = uri.replace(re, '$1' + key + "=" + value + '$2');
	} else {
		uri = uri + separator + key + "=" + value;
	}
	//return uri + hash;
	window.location.href = uri + hash;
}

var setCookie = function(name, value, exp) {
	var date = new Date();
	date.setTime(date.getTime() + exp*24*60*60*1000);
	document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
};

var getCookie = function(name) {
	var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
	return value? value[2] : null;
};

var getCookieSplited = function(name) {
	var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
	return value? value[2].split("&") : null;
}

var addCookie = function(name, value) {
	var cookie = getCookie(name);
	if (cookie != 0)
		setCookie(name, cookie + "&" + value , 5); 
	else
		setCookie(name, value, 5);
};

var addPlan = function(type, code) {
	addCookie("plan", "["+ type + "," +  code + "]");
	alert("일정에 추가되었습니다.");
};