<script type="text/javascript" src="template/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
function ajaxfilemanager(field_name, url, type, win) 
{
 var ajaxfilemanagerurl = "template/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php";
 switch (type) {
  case "image":
   break;
  case "media":
   break;
  case "flash": 
   break;
  case "file":
   break;
  default:
   return false;
 }
  tinyMCE.activeEditor.windowManager.open(
  {
      url: "template/plugins/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
      width: 782,
      height: 440,
      inline : "yes",
      close_previous : "no"
  },
  {
      window : win,
      input : field_name
  });
          
 /*return false;   
 var fileBrowserWindow = new Array();
 fileBrowserWindow["file"] = ajaxfilemanagerurl;
 fileBrowserWindow["title"] = "Ajax File Manager";
 fileBrowserWindow["width"] = "782";
 fileBrowserWindow["height"] = "440";
 fileBrowserWindow["close_previous"] = "no";
 tinyMCE.openWindow(fileBrowserWindow, {
   window : win,
   input : field_name,
   resizable : "yes",
   inline : "yes",
   editor_id : tinyMCE.getWindowArg("editor_id")
 });
 
 return false;*/
}
</script>

<script type="text/javascript">
tinyMCE.init(
{

// General options
mode : "textareas",
elements : "ajaxfilemanager",
file_browser_callback : 'ajaxfilemanager',

theme : "advanced",
plugins : "safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,print,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

// Theme options
theme_advanced_buttons1 : "undo,redo,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
theme_advanced_buttons2 : "formatselect,fontselect,fontsizeselect,insertfile,insertimage",
theme_advanced_buttons3 : "sub,sup,search,replace,|,bullist,numlist,|,outdent,indent,emotions,iespell,media,advhr",
theme_advanced_buttons4 : "image,charmap,preview,forecolor,backcolor,hr,removeformat,link,unlink,anchor,cite,visualaid",
theme_advanced_buttons5 : "tablecontrols",

theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
relative_urls : false,
remove_script_host : false,

// Example content CSS (should be your site CSS)
content_css : "css/content.css",

// Drop lists for link/image/media/template dialogs

// Replace values for the template plugin
template_replace_values : 
{
 username : "Some User",
 staffid : "991234"
}
});
</script>