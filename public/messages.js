/*!
 *  Lang.js for Laravel localization in JavaScript.
 *
 *  @version 1.1.10
 *  @license MIT https://github.com/rmariuzzo/Lang.js/blob/master/LICENSE
 *  @site    https://github.com/rmariuzzo/Lang.js
 *  @author  Rubens Mariuzzo <rubens@mariuzzo.com>
 */
(function(root,factory){"use strict";if(typeof define==="function"&&define.amd){define([],factory)}else if(typeof exports==="object"){module.exports=factory()}else{root.Lang=factory()}})(this,function(){"use strict";function inferLocale(){if(typeof document!=="undefined"&&document.documentElement){return document.documentElement.lang}}function convertNumber(str){if(str==="-Inf"){return-Infinity}else if(str==="+Inf"||str==="Inf"||str==="*"){return Infinity}return parseInt(str,10)}var intervalRegexp=/^({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])$/;var anyIntervalRegexp=/({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])/;var defaults={locale:"en"};var Lang=function(options){options=options||{};this.locale=options.locale||inferLocale()||defaults.locale;this.fallback=options.fallback;this.messages=options.messages};Lang.prototype.setMessages=function(messages){this.messages=messages};Lang.prototype.getLocale=function(){return this.locale||this.fallback};Lang.prototype.setLocale=function(locale){this.locale=locale};Lang.prototype.getFallback=function(){return this.fallback};Lang.prototype.setFallback=function(fallback){this.fallback=fallback};Lang.prototype.has=function(key,locale){if(typeof key!=="string"||!this.messages){return false}return this._getMessage(key,locale)!==null};Lang.prototype.get=function(key,replacements,locale){if(!this.has(key,locale)){return key}var message=this._getMessage(key,locale);if(message===null){return key}if(replacements){message=this._applyReplacements(message,replacements)}return message};Lang.prototype.trans=function(key,replacements){return this.get(key,replacements)};Lang.prototype.choice=function(key,number,replacements,locale){replacements=typeof replacements!=="undefined"?replacements:{};replacements.count=number;var message=this.get(key,replacements,locale);if(message===null||message===undefined){return message}var messageParts=message.split("|");var explicitRules=[];for(var i=0;i<messageParts.length;i++){messageParts[i]=messageParts[i].trim();if(anyIntervalRegexp.test(messageParts[i])){var messageSpaceSplit=messageParts[i].split(/\s/);explicitRules.push(messageSpaceSplit.shift());messageParts[i]=messageSpaceSplit.join(" ")}}if(messageParts.length===1){return message}for(var j=0;j<explicitRules.length;j++){if(this._testInterval(number,explicitRules[j])){return messageParts[j]}}var pluralForm=this._getPluralForm(number);return messageParts[pluralForm]};Lang.prototype.transChoice=function(key,count,replacements){return this.choice(key,count,replacements)};Lang.prototype._parseKey=function(key,locale){if(typeof key!=="string"||typeof locale!=="string"){return null}var segments=key.split(".");var source=segments[0].replace(/\//g,".");return{source:locale+"."+source,sourceFallback:this.getFallback()+"."+source,entries:segments.slice(1)}};Lang.prototype._getMessage=function(key,locale){locale=locale||this.getLocale();key=this._parseKey(key,locale);if(this.messages[key.source]===undefined&&this.messages[key.sourceFallback]===undefined){return null}var message=this.messages[key.source];var entries=key.entries.slice();var subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]!==undefined){message=message[subKey];subKey=""}}if(typeof message!=="string"&&this.messages[key.sourceFallback]){message=this.messages[key.sourceFallback];entries=key.entries.slice();subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]){message=message[subKey];subKey=""}}}if(typeof message!=="string"){return null}return message};Lang.prototype._findMessageInTree=function(pathSegments,tree){while(pathSegments.length&&tree!==undefined){var dottedKey=pathSegments.join(".");if(tree[dottedKey]){tree=tree[dottedKey];break}tree=tree[pathSegments.shift()]}return tree};Lang.prototype._applyReplacements=function(message,replacements){for(var replace in replacements){message=message.replace(new RegExp(":"+replace,"gi"),function(match){var value=replacements[replace];var allCaps=match===match.toUpperCase();if(allCaps){return value.toUpperCase()}var firstCap=match===match.replace(/\w/i,function(letter){return letter.toUpperCase()});if(firstCap){return value.charAt(0).toUpperCase()+value.slice(1)}return value})}return message};Lang.prototype._testInterval=function(count,interval){if(typeof interval!=="string"){throw"Invalid interval: should be a string."}interval=interval.trim();var matches=interval.match(intervalRegexp);if(!matches){throw"Invalid interval: "+interval}if(matches[2]){var items=matches[2].split(",");for(var i=0;i<items.length;i++){if(parseInt(items[i],10)===count){return true}}}else{matches=matches.filter(function(match){return!!match});var leftDelimiter=matches[1];var leftNumber=convertNumber(matches[2]);if(leftNumber===Infinity){leftNumber=-Infinity}var rightNumber=convertNumber(matches[3]);var rightDelimiter=matches[4];return(leftDelimiter==="["?count>=leftNumber:count>leftNumber)&&(rightDelimiter==="]"?count<=rightNumber:count<rightNumber)}return false};Lang.prototype._getPluralForm=function(count){switch(this.locale){case"az":case"bo":case"dz":case"id":case"ja":case"jv":case"ka":case"km":case"kn":case"ko":case"ms":case"th":case"tr":case"vi":case"zh":return 0;case"af":case"bn":case"bg":case"ca":case"da":case"de":case"el":case"en":case"eo":case"es":case"et":case"eu":case"fa":case"fi":case"fo":case"fur":case"fy":case"gl":case"gu":case"ha":case"he":case"hu":case"is":case"it":case"ku":case"lb":case"ml":case"mn":case"mr":case"nah":case"nb":case"ne":case"nl":case"nn":case"no":case"om":case"or":case"pa":case"pap":case"ps":case"pt":case"so":case"sq":case"sv":case"sw":case"ta":case"te":case"tk":case"ur":case"zu":return count==1?0:1;case"am":case"bh":case"fil":case"fr":case"gun":case"hi":case"hy":case"ln":case"mg":case"nso":case"xbr":case"ti":case"wa":return count===0||count===1?0:1;case"be":case"bs":case"hr":case"ru":case"sr":case"uk":return count%10==1&&count%100!=11?0:count%10>=2&&count%10<=4&&(count%100<10||count%100>=20)?1:2;case"cs":case"sk":return count==1?0:count>=2&&count<=4?1:2;case"ga":return count==1?0:count==2?1:2;case"lt":return count%10==1&&count%100!=11?0:count%10>=2&&(count%100<10||count%100>=20)?1:2;case"sl":return count%100==1?0:count%100==2?1:count%100==3||count%100==4?2:3;case"mk":return count%10==1?0:1;case"mt":return count==1?0:count===0||count%100>1&&count%100<11?1:count%100>10&&count%100<20?2:3;case"lv":return count===0?0:count%10==1&&count%100!=11?1:2;case"pl":return count==1?0:count%10>=2&&count%10<=4&&(count%100<12||count%100>14)?1:2;case"cy":return count==1?0:count==2?1:count==8||count==11?2:3;case"ro":return count==1?0:count===0||count%100>0&&count%100<20?1:2;case"ar":return count===0?0:count==1?1:count==2?2:count%100>=3&&count%100<=10?3:count%100>=11&&count%100<=99?4:5;default:return 0}};return Lang});

(function () {
    Lang = new Lang();
    Lang.setMessages({"en.datatable":{"emptyTable":"No records","first":"First page","info":"Display from record number _START_ to _END_ in _TOTAL_ records","infoEmpty":"Showing 0 to 0 of 0 records","last":"Last page","loadingRecords":"Loading ...","next":"Next page","previous":"Previous page","processing":"Loading ...","record":"Record","search":"Search:","zeroRecords":"No record found"},"en.global":{"action":"Action","active":"Active","active_icon":"<i class=\"fa fa-check\" style=\"font-weight: bold; color: green\" data-tooltip=\"tooltip\" data-placement=\"left\" title=\"Active\"><\/i>","add":"Create","admin":"Admin","all":"All","are_you_sure_to_delete":"Are you sure to delete ?","birthday":"Birthday","cancle":"Cancle","clean_file":"Truncate file log","confirm":"Confirm","content":"Content","context":"Context","cpu_usage":"CPU usage","create_success":"Create success !","created_at":"Created at","customer_normal":"Customer normal","customer_vip":"Customer vip","daily_traffic":"Daily traffic","dashboard":"Dashboard","deactive":"Deactive","deactive_icon":"<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\" style=\"font-weight: bold; color: #dc3545\" data-tooltip=\"tooltip\" data-placement=\"left\" title=\"Deactive\"><\/i>","delete":"Delete","delete_file":"Delete file log","delete_success":"Delete success !","description":"Description","disk_usage":"Disk usage","display_name":"Display name","download_file":"Download file log","edit":"Edit","email":"Email","email_exists":"Email Email already exists","female_icon":"<i class=\"fa fa-venus\" style=\"font-weight:bold; color: #e05f5f\"><\/i>","forgot_password":"Forgot password","gender":"Gender","hide":"Hide","info":"Infomation","information_sumary":"Information sumary","ip":"IP","language":"Language","level":"Level","link":"Link","list":"List","list_permission":"List permissions","list_user":"List user","male_icon":"<i class=\"fa fa-mars\" style=\"font-weight:bold; color: #6666f6\"><\/i>","managers":"Manager","mark_all_as_read":"Mark all as read","memory_usage":"Memory usage","message":"Message","method":"Method","mobile":"Mobile","module_managers":"Module manager","modules":"Module","name":"Name","new_message":"New message","not_records":"Not records","not_updated":"Not updated","not_user":"User does not exist.","not_yet_member":"Not yet member","notification":"Notification","offline_contacts":"Offline contacts","online_contacts":"Online contacts","order":"Order","password":"Password","permission":"Permission","please_enter_content":"Please enter content","please_enter_email":"Please enter email","please_enter_password":"Please enter password","plugins":"Plugin","profile":"Personal information","records":"Record","role":"Role","route":"Route","save":"Save","save_icon":"<i class=\"fa fa-floppy-o\" aria-hidden=\"true\"><\/i>","search":"Search ...","setting":"Setting","show":"Show","show_all_message":"View all message","show_all_notification":"Show all notification","sign_in":"Sign in","sign_out":"Sign out","sign_up":"Sign up","status":"Status","system_manager":"System manager","time":"Time","type":"Type","update_success":"Update success !","user":"User","user_agent":"User agent","welcome":"Welcome, "},"en.module":{"list":"List module","module_category":"Module category","module_name":"Module name","note":"Note"},"en.user":{"birthday":"Birthday","email":"Email","email_not_invalid":"Email wrong format. (VD: abcxyz@gmail.com)","female":"Female","gender":"Gender","male":"Male","mobile":"Mobile","name":"Name","please_enter_birthday":"Please enter birthday","please_enter_email":"Please enter email","please_enter_mobile":"Please enter mobile","please_enter_name":"Please enter name","status":"Status","type":"User type"},"vi.datatable":{"emptyTable":"Kh\u00f4ng c\u00f3 b\u1ea3n ghi n\u00e0o","first":"Trang \u0111\u1ea7u","info":"Hi\u1ec3n th\u1ecb t\u1eeb b\u1ea3n ghi s\u1ed1 _START_ \u0111\u1ebfn _END_ trong _TOTAL_ b\u1ea3n ghi","infoEmpty":"Hi\u1ec3n th\u1ecb 0 \u0111\u1ebfn 0 trong 0 b\u1ea3n ghi","last":"Trang cu\u1ed1i","loadingRecords":"\u0110ang t\u1ea3i ...","next":"Trang ti\u1ebfp","previous":"Trang tr\u01b0\u1edbc","processing":"\u0110ang t\u1ea3i ...","record":"B\u1ea3n ghi","search":"T\u00ecm ki\u1ebfm:","zeroRecords":"Kh\u00f4ng t\u00ecm th\u1ea5y b\u1ea3n ghi n\u00e0o"},"vi.global":{"action":"H\u00e0nh \u0111\u1ed9ng","active":"Active","active_icon":"<i class=\"fa fa-check\" style=\"font-weight: bold; color: green\" data-tooltip=\"tooltip\" data-placement=\"left\" title=\"Active\"><\/i>","add":"T\u1ea1o m\u1edbi","admin":"Qu\u1ea3n tr\u1ecb vi\u00ean","all":"T\u1ed5ng quan","are_you_sure_to_delete":"B\u1ea1n c\u00f3 ch\u1eafc ch\u1eafn mu\u1ed1n xo\u00e1 ?","birthday":"Ng\u00e0y sinh","cancle":"Hu\u1ef7 b\u1ecf","clean_file":"Xo\u00e1 n\u1ed9i dung","confirm":"\u0110\u1ed3ng \u00fd","content":"N\u1ed9i dung","context":"M\u00f4i tr\u01b0\u1eddng","cpu_usage":"CPU s\u1eed d\u1ee5ng","create_success":"T\u1ea1o th\u00e0nh c\u00f4ng !","created_at":"Ng\u00e0y t\u1ea1o","customer_normal":"Kh\u00e1ch th\u01b0\u1eddng","customer_vip":"Kh\u00e1ch vip","daily_traffic":"L\u01b0u l\u01b0\u1ee3ng s\u1eed d\u1ee5ng","dashboard":"B\u1ea3ng \u0111i\u1ec1u khi\u1ec3n","deactive":"Deactive","deactive_icon":"<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\" style=\"font-weight: bold; color: #dc3545\" data-tooltip=\"tooltip\" data-placement=\"left\" title=\"Deactive\"><\/i>","delete":"Xo\u00e1","delete_file":"Xo\u00e1 file log","delete_success":"Xo\u00e1 th\u00e0nh c\u00f4ng !","description":"Mi\u00eau t\u1ea3","disk_usage":"\u1ed4 \u0111\u0129a s\u1eed d\u1ee5ng","display_name":"T\u00ean hi\u1ec3n th\u1ecb","download_file":"T\u1ea3i xu\u1ed1ng file log","edit":"Ch\u1ec9nh s\u1eeda","email":"Email","email_exists":"Email n\u00e0y \u0111\u00e3 t\u1ed3n t\u1ea1i.","female_icon":"<i class=\"fa fa-venus\" style=\"font-weight:bold; color: #e05f5f\"><\/i>","forgot_password":"Qu\u00ean m\u1eadt kh\u1ea9u?","gender":"Gi\u1edbi t\u00ednh","hide":"\u1ea8n","info":"Th\u00f4ng tin","information_sumary":"Th\u1ed1ng k\u00ea th\u00f4ng tin","ip":"IP","language":"Ng\u00f4n ng\u1eef","level":"M\u1ee9c \u0111\u1ed9","link":"Link","list":"Danh s\u00e1ch","list_permission":"Danh s\u00e1ch quy\u1ec1n h\u1ea1n","list_user":"Danh s\u00e1ch ng\u01b0\u1eddi d\u00f9ng","male_icon":"<i class=\"fa fa-mars\" style=\"font-weight:bold; color: #6666f6\"><\/i>","managers":"Qu\u1ea3n l\u00fd","mark_all_as_read":"\u0110\u00e1nh d\u1ea5u \u0111\u00e3 \u0111\u1ecdc t\u1ea5t c\u1ea3","memory_usage":"B\u1ed9 nh\u1edb s\u1eed d\u1ee5ng","message":"Tin nh\u1eafn","method":"Ph\u01b0\u01a1ng th\u1ee9c","mobile":"SDT","module_managers":"Module","modules":"Ch\u1ee9c n\u0103ng","name":"T\u00ean","new_message":"Tin nh\u1eafn m\u1edbi","not_records":"Kh\u00f4ng c\u00f3 b\u1ea3n ghi d\u1eef li\u1ec7u n\u00e0o","not_updated":"Ch\u01b0a c\u1eadp nh\u1eadt","not_user":"Ng\u01b0\u1eddi d\u00f9ng kh\u00f4ng ch\u00ednh x\u00e1c. Vui l\u00f2ng th\u1eed l\u1ea1i.","not_yet_member":"Ch\u01b0a l\u00e0 th\u00e0nh vi\u00ean","notification":"Th\u00f4ng b\u00e1o","offline_contacts":"Li\u00ean h\u1ec7 \u0111ang v\u1eafng","online_contacts":"Li\u00ean h\u1ec7 \u0111ang ho\u1ea1t \u0111\u1ed9ng","order":"STT","password":"M\u1eadt kh\u1ea9u","permission":"Quy\u1ec1n h\u1ea1n","please_enter_content":"Vui l\u00f2ng nh\u1eadp n\u1ed9i dung","please_enter_email":"Vui l\u00f2ng nh\u1eadp email","please_enter_password":"Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u","plugins":"C\u00f4ng c\u1ee5","profile":"Th\u00f4ng tin c\u00e1 nh\u00e2n","records":"b\u1ea3n ghi","role":"Vai tr\u00f2","route":"\u0110\u01b0\u1eddng d\u1eabn","save":"L\u01b0u l\u1ea1i","save_icon":"<i class=\"fa fa-floppy-o\" aria-hidden=\"true\"><\/i>","search":"T\u00ecm ki\u1ebfm ...","setting":"C\u00e0i \u0111\u1eb7t","show":"Hi\u1ec3n th\u1ecb","show_all_message":"Xem t\u1ea5t c\u1ea3 tin nh\u1eafn","show_all_notification":"Xem t\u1ea5t c\u1ea3 th\u00f4ng b\u00e1o","sign_in":"\u0110\u0103ng nh\u1eadp","sign_out":"\u0110\u0103ng xu\u1ea5t","sign_up":"\u0110\u0103ng k\u00fd","status":"Tr\u1ea1ng th\u00e1i","system_manager":"H\u1ec7 th\u1ed1ng qu\u1ea3n l\u00fd","time":"Th\u1eddi gian","type":"Lo\u1ea1i","update_success":"Ch\u1ec9nh s\u1eeda th\u00e0nh c\u00f4ng !","user":"Ng\u01b0\u1eddi d\u00f9ng","user_agent":"Thi\u1ebft b\u1ecb","welcome":"Xin ch\u00e0o, "},"vi.module":{"list":"Danh s\u00e1ch module","module_category":"Nh\u00f3m module","module_name":"T\u00ean module","note":"Ghi ch\u00fa"},"vi.user":{"birthday":"Ng\u00e0y sinh","email":"\u0110\u1ecba ch\u1ec9 email","email_not_invalid":"Email kh\u00f4ng \u0111\u00fang \u0111\u1ecbnh d\u1ea1ng. (VD: abcxyz@gmail.com)","female":"N\u1eef","gender":"Gi\u1edbi t\u00ednh","male":"Nam","mobile":"S\u1ed1 \u0111i\u1ec7n tho\u1ea1i","name":"H\u1ecd v\u00e0 t\u00ean","please_enter_birthday":"Vui l\u00f2ng ch\u1ecdn ng\u00e0y sinh","please_enter_email":"Vui l\u00f2ng nh\u1eadp \u0111\u1ecba ch\u1ec9 email","please_enter_mobile":"Vui l\u00f2ng nh\u1eadp s\u1ed1 \u0111i\u1ec7n tho\u1ea1i","please_enter_name":"Vui l\u00f2ng nh\u1eadp h\u1ecd v\u00e0 t\u00ean","status":"Tr\u1ea1ng th\u00e1i","type":"Lo\u1ea1i ng\u01b0\u1eddi d\u00f9ng"}});
})();
