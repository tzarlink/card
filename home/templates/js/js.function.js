/*
* 判断是否是手机浏览后进行页面跳转
*/
function uaredirect(murl){
    try {
		if(document.getElementById("bdmark") != null){
			return;
		}
		var urlhash = window.location.hash;
		if (!urlhash.match("fromapp")){
			if ((navigator.userAgent.match(/(240\x320|acer|acoon|acs-|abacho|ahong|airness|alcatel|amoi|android|anywhereyougo.com|asus|audio|au-mic|avantogo|becker|benq|bilbo|bird|blackberry|blazer|bleu|cdm-|compal|coolpad|danger|dbtel|dopod|elaine|eric|etouch|fly |fly_|fly-|go.web|goodaccess|gradiente|grundig|haier|hedy|hitachi|htc|huawei|hutchison|inno|ipad|ipaq|ipod|jbrowser|kddi|kgt|kwc|lenovo|lg |lg2|lg3|lg4|lg5|lg7|lg8|lg9|lg-|lge-|lge9|longcos|maemo|mercator|meridian|micromax|midp|mini|mitsu|mmm|mmp|mobi|mot-|moto|nec-|netfront|newgen|nexian|nf-browser|nintendo|nitro|nokia|nook|novarra|obigo|palm|panasonic|pantech|philips|phone|pg-|playstation|pocket|pt-|qc-|qtek|rover|sagem|sama|samu|sanyo|samsung|sch-|scooter|sec-|sendo|sgh-|sharp|siemens|sie-|softbank|sony|spice|sprint|spv|symbian|tablet|talkabout|tcl-|teleca|telit|tianyu|tim-|toshiba|tsm|up.browser|utec|utstar|verykool|virgin|vk-|voda|voxtel|vx|wap|wellco|wig browser|wii|windows ce|wireless|xda|xde|zte|mt15i)/i)) && !navigator.userAgent.match(/(msie)/i)) {
				location.replace(murl);
			}
		}
	} catch(err){}
}