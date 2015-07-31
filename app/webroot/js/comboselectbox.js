var _objSelActive;
var _offsetTop;
var _offsetLeft;
var _offsetLeftClip;
var _comboBoxArray;
var _blkName = 'bcs_comboBox';
var _currentBrowser = '';

window.onload = function () {
	var _currentBrowser = checkBrowser();
	if(_currentBrowser[0] == "Explorer") {
		_offsetTop = 0;
		_offsetLeft = -3;
		_offsetLeftClip = 18;
	} else {
		_offsetTop = 0;
		_offsetLeft = -1;
		_offsetLeftClip = 18;
	}
	_objSelActive = false;

	if(document.getElementById){
		_comboBoxArray = createComboList();
		repositionComboBox();
		repositionComboBox(); // this second request appears to take care of spans that are in embedded in tables
	}

	window.onresize = repositionComboBox;
}

function createComboList() {
	// get all "bcs_comboBox" block elements in the document
	var elements = null;
	var found = new Array();
	var re = new RegExp('\\b'+_blkName+'\\b');
	if (document.getElementsByTagName) {elements = document.getElementsByTagName('*');}
	else if (document.all) {elements = document.all.tags('*');}
	if (elements) {
		for (var i = 0; i < elements.length; ++i) {
			if (elements[i].id.search(re) != -1) {
				// Now we have a valid block element get the input and select id
				inpObj = elements[i].getElementsByTagName("input")[0];
				selObj = elements[i].getElementsByTagName("select")[0]
				found[found.length] = [inpObj.id,selObj.id];
				selObj.selectedIndex = -1;
			}
		}
	}
	return found;
}

function checkEvent(evt){
	var ie_var = "srcElement";
	var moz_var = "target";
	// "target" for Mozilla, Netscape, Firefox et al. ; "srcElement" for IE
	if(evt[moz_var]) {
		return [ evt[moz_var]['inputEl'],evt[moz_var]['selectEl'] ];
	} else {
		return [ evt[ie_var]['inputEl'],evt[ie_var]['selectEl'] ];
	}
}

function comboFocus(cId) {
	document.getElementById(cId).focus();
	return false;
}

function evtSelect(evt) {
	objs = checkEvent(evt);
	idEdit = objs[0];
	idSel = objs[1];
	if(idSel.selectedIndex > -1) {
		document.getElementById(idEdit).value = idSel.options[idSel.options.selectedIndex].text;
		idSel.selectedIndex = -1;
	}
	comboFocus(idEdit);
}

function evtKey(evt) {
	objs = checkEvent(evt);
	idEdit = objs[0];
	idSel = objs[1];

	if(window.event)
		keyCode = window.event.keyCode;  //IE
	else
		keyCode = evt.keyCode;           //firefox

	if (keyCode == 27) {
		idSel.selectedIndex = -1;
		comboFocus(idEdit);
		_objSelActive = false;
	}
}

function findPos(obj) {
	// Credit for this function: http://www.quirksmode.org/js/findpos.html
	// Visit the URL for a complete tutorial on this function
	var curleft = curtop = parent_offSetLeft = parent_offSetTop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		curwidth = obj.offsetWidth;
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
			if(obj.id) {
				parent_offSetLeft = obj.offsetLeft;
				parent_offSetTop = obj.offsetTop;
			}
		}
	}
	return [curleft,curtop,curwidth,parent_offSetLeft,parent_offSetTop];
}

function positionComboBox(inpId, selId) {
	inpObj = document.getElementById(inpId);
	selObj = document.getElementById(selId);
	// Positioning of the combotext boxes
	inpObj.style.marginRight = _offsetLeftClip+'px';
	inpObj.style.position = "relative";
	selObj.style.position = "absolute";
	selObj.style.height = inpObj.offsetHeight+'px';

	ofs=findPos(inpObj);                                        // Find the left,top & width of span

//alert('Left:'+ofs[0]+', Top:'+ofs[1]+', Width:'+ofs[2]+', Parent Left:'+ofs[3]+', Parent Top:'+ofs[4]);
//alert('curtop:'+ofs[1]+' parent offset top:'+ofs[4]+' parent top'+inpObj.offsetParent.offsetTop);
//alert('position top:'+(ofs[1]-inpObj.offsetParent.offsetTop));
//alert('curleft:'+ofs[0]+' parent offset left:'+ofs[3]+' parent left'+inpObj.offsetParent.offsetLeft);
//alert('position left:'+(ofs[0]-inpObj.offsetParent.offsetLeft));
	selObj.style.top=(ofs[1]-inpObj.offsetParent.offsetTop-ofs[4]+_offsetTop)+'px';      // Set select box top location
	selObj.style.left=(ofs[0]-ofs[3]+_offsetLeft)+'px';    // Set select box left location = curleft+_offsetLeft+parent_offSetLeft
	selObj.style.width=(inpObj.offsetWidth+_offsetLeftClip)+'px';
	// The next line crops the select box and shows only the button
	selObj.style.clip = 'rect(0px, '+selObj.offsetWidth+'px, auto, '+
		(selObj.offsetWidth-_offsetLeftClip)+'px)';

	if(window.addEventListener){ // Mozilla, Netscape, Firefox
		selObj.addEventListener('change', evtSelect, false);
		selObj.addEventListener('keyup', evtKey, false);
		selObj.inputEl = inpObj.id;
		selObj.selectEl = selObj;
	} else { // IE
		selObj.attachEvent('onchange', evtSelect);
		selObj.attachEvent('onkeyup', evtKey);
		selObj.inputEl = inpObj.id;
		selObj.selectEl = selObj;
	}

	selObj.style.visibility = 'visible';
}

function checkBrowser() {
	// Credit for this function: http://www.quirksmode.org/js/detect.html
	// Visit the URL for a complete tutorial on this function
	var BrowserDetect = {
		init: function () {
			this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
			this.version = this.searchVersion(navigator.userAgent)
				|| this.searchVersion(navigator.appVersion)
				|| "an unknown version";
			this.OS = this.searchString(this.dataOS) || "an unknown OS";
		},
		searchString: function (data) {
			for (var i=0;i<data.length;i++) {
				var dataString = data[i].string;
				var dataProp = data[i].prop;
				this.versionSearchString = data[i].versionSearch || data[i].identity;
				if (dataString) {
					if (dataString.indexOf(data[i].subString) != -1)
						return data[i].identity;
				}
				else if (dataProp)
					return data[i].identity;
			}
		},
		searchVersion: function (dataString) {
			var index = dataString.indexOf(this.versionSearchString);
			if (index == -1) return;
			return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
		},
		dataBrowser: [
			{ string: navigator.userAgent,
				subString: "OmniWeb",
				versionSearch: "OmniWeb/",
				identity: "OmniWeb"
			},
			{
				string: navigator.vendor,
				subString: "Apple",
				identity: "Safari"
			},
			{
				prop: window.opera,
				identity: "Opera"
			},
			{
				string: navigator.vendor,
				subString: "iCab",
				identity: "iCab"
			},
			{
				string: navigator.vendor,
				subString: "KDE",
				identity: "Konqueror"
			},
			{
				string: navigator.userAgent,
				subString: "Firefox",
				identity: "Firefox"
			},
			{
				string: navigator.vendor,
				subString: "Camino",
				identity: "Camino"
			},
			{   // for newer Netscapes (6+)
				string: navigator.userAgent,
				subString: "Netscape",
				identity: "Netscape"
			},
			{
				string: navigator.userAgent,
				subString: "MSIE",
				identity: "Explorer",
				versionSearch: "MSIE"
			},
			{
				string: navigator.userAgent,
				subString: "Gecko",
				identity: "Mozilla",
				versionSearch: "rv"
			},
			{     // for older Netscapes (4-)
				string: navigator.userAgent,
				subString: "Mozilla",
				identity: "Netscape",
				versionSearch: "Mozilla"
			}
		],
		dataOS : [
			{
				string: navigator.platform,
				subString: "Win",
				identity: "Windows"
			},
			{
				string: navigator.platform,
				subString: "Mac",
				identity: "Mac"
			},
			{
				string: navigator.platform,
				subString: "Linux",
				identity: "Linux"
			}
		]

	};
	BrowserDetect.init();

//  document.write('Browser name:'+BrowserDetect.browser);
//  document.write("<br />");
//  document.write('Browser version: '+BrowserDetect.version);
//  document.write("<br />");
//  document.write('OS name: '+BrowserDetect.OS);
//  document.write("<br />");

	return [BrowserDetect.browser,BrowserDetect.version,BrowserDetect.OS];
}

function repositionComboBox() {
	for(j=0; j<_comboBoxArray.length;j++) {
		positionComboBox(_comboBoxArray[j][0],_comboBoxArray[j][1])
	}
}

