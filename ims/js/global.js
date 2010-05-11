var btmenu_usepopups = false;
var ignorequotechars = 0;

var userAgent = navigator.userAgent.toLowerCase();
var is_opera  = (userAgent.indexOf('opera') != -1);
var is_saf    = ((userAgent.indexOf('applewebkit') != -1) || (navigator.vendor == "Apple Computer, Inc."));
var is_webtv  = (userAgent.indexOf('webtv') != -1);
var is_ie     = ((userAgent.indexOf('msie') != -1) && (!is_opera) && (!is_saf) && (!is_webtv));
var is_ie4    = ((is_ie) && (userAgent.indexOf("msie 4.") != -1));
var is_moz    = ((navigator.product == 'Gecko') && (!is_saf));
var is_kon    = (userAgent.indexOf('konqueror') != -1);
var is_ns     = ((userAgent.indexOf('compatible') == -1) && (userAgent.indexOf('mozilla') != -1) && (!is_opera) && (!is_webtv) && (!is_saf));
var is_ns4    = ((is_ns) && (parseInt(navigator.appVersion) == 4));

var is_regexp = (window.RegExp) ? true : false;

var btDOMtype = '';
if (document.getElementById)
{
btDOMtype = "std";
}
else if (document.all)
{
btDOMtype = "ie4";
}
else if (document.layers)
{
btDOMtype = "ns4";
}

var vBobjects = new Array();

function fetch_object(idname, forcefetch)
{
  if (forcefetch || typeof(vBobjects[idname]) == "undefined")
  {
  switch (btDOMtype)
  {
  case "std":
  {
  vBobjects[idname] = document.getElementById(idname);
  }
  break;
  
  case "ie4":
  {
  vBobjects[idname] = document.all[idname];
  }
  break;
  
  case "ns4":
  {
  vBobjects[idname] = document.layers[idname];
  }
  break;
  }
  }
  return vBobjects[idname];
}

function do_an_e(eventobj)
{
  if (!eventobj || is_ie)
  {
  window.event.returnValue = false;
  window.event.cancelBubble = true;
  return window.event;
  }
  else
  {
  eventobj.stopPropagation();
  eventobj.preventDefault();
  return eventobj;
  }
}

function iif(condition, trueval, falseval)
{
  return condition ? trueval : falseval;
}

function in_array(ineedle, haystack, caseinsensitive)
{
  var needle = new String(ineedle);
  
  if (caseinsensitive)
  {
  needle = needle.toLowerCase();
  for (i in haystack)
  {
  if (haystack[i].toLowerCase() == needle)
  {
  return i;
  }
  }
  }
  else
  {
  for (i in haystack)
  {
  if (haystack[i] == needle)
  {
  return i;
  }
  }
  }
  return -1;
}