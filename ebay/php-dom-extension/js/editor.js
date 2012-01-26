var editor_loaded = false,
    popupcontrols = [],
    colorindex = [],
    fontoptions = [],
    sizeoptions = [],
    buttonstatus = [],
    imgurl = 'http://',
    linkurl = 'http://',
    is_v4 = false;
    
if ((navigator.appVersion.indexOf("MSIE 4.") != "-1" && is_ie) || (parseInt(navigator.appVersion) == 4 && is_ns)) { // the v4 browsers dont support try / catch
  is_v4 = true;
}

function format_control(elm, elmtype, controlstate) {
  if (typeof(elm.controlstate) != "undefined" && controlstate == elm.controlstate) {
    return;
  }

  var istyle = "pi_" + elmtype + "_" + controlstate;

  elm.style.background = istyles[istyle][0];
  elm.style.color = istyles[istyle][1];
  if (elmtype != "menu") {
    elm.style.padding = istyles[istyle][2];
  }
  elm.style.border = istyles[istyle][3];

  elm.controlstate = controlstate;

  if (typeof(elm.cmd) != "undefined" && in_array(elm.cmd, popupcontrols) != -1) {
    var tds = elm.getElementsByTagName("td");
    for (var i = 0; i < tds.length; i++) {
      switch (tds[i].className) {
        // set the right-border for popup_feedback class elements
        case "popup_feedback": {
          tds[i].style.borderRight = iif(controlstate == "normal", istyles["pi_menu_normal"][3], istyles[istyle][3]);
        }
        break;
        case "popup_pickbutton": {
          tds[i].style.borderColor = iif(controlstate == "normal", istyles["pi_menu_normal"][0], istyles[istyle][0]);
        }
        break;
        case "alt_pickbutton": {
          if (buttonstatus[elm.cmd]) {
            tds[i].style.paddingLeft = istyles["pi_button_normal"][2];
            tds[i].style.borderLeft = istyles["pi_button_normal"][3];
          } else {
            tds[i].style.paddingLeft = istyles[istyle][2];
            tds[i].style.borderLeft = istyles[istyle][3];
          }
        }
      }
    }
  }
}

function set_unselectable(elm) {
  if (is_ie4) {
    return;
  } else if (typeof(elm.tagName) != "undefined") {
    if (elm.hasChildNodes()) {
      for (var i = 0; i < elm.childNodes.length; i++) {
        set_unselectable(elm.childNodes[i]);
      }
    }
    elm.unselectable = true;
  }
}

function set_default_text(textvalue, is_wysiwyg, non_wysiwyg_obj) {
  if (is_wysiwyg) {
    if (is_ie) {
      if (textvalue == "") {
        textvalue = "<p style=\"margin:0px\"></p>";
      }
      fetch_object("htmlbox").innerHTML = textvalue;
      fetch_object("htmlbox").className = "wysiwyg";
    } else {
      var htb = fetch_object("htmlbox").contentWindow.document;
      htb.open();
      htb.write("<html><head><title>WYSIWYG</title></head><body>" + textvalue + "</body></html>");
      htb.close();
      htb.body.style.cursor = "text";

      var bgstyle = fetch_mozilla_css_class(".wysiwyg");
      if (bgstyle != false) {
      } else {
        bgstyle = {
          "backgroundColor" : "white",
          "color" : "black",
          "fontFamily": "verdana, geneva, lucida, 'lucida grande', arial, helvetica, sans-serif",
          "fontSize": "10pt"
        };
      }

      htb.body.style.backgroundColor = bgstyle.backgroundColor;
      htb.body.style.color = bgstyle.color;
      htb.body.style.fontFamily = bgstyle.fontFamily;
      htb.body.style.fontSize = bgstyle.fontSize;
    }
  } else {
    non_wysiwyg_obj.value = textvalue;
  }
}

function fetch_mozilla_css_class(selector) {
  for (var s = 0; s < document.styleSheets.length; s++) {
    for (var r = 0; r < document.styleSheets[s].cssRules.length; r++) {
      if (document.styleSheets[s].cssRules[r].selectorText == selector) {
        return document.styleSheets[s].cssRules[r].style;
      }
    }
  }
  return false;
}

function alter_box_height(boxid, pixelvalue) {

  var box = fetch_object(boxid),
  boxheight = parseInt(box.style.height),
  newheight = boxheight + pixelvalue;

  if (newheight > 0) {
    box.style.height = newheight + "px";
  }
  
  return false;
}