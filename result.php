<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Форма поиска</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="content-language" content="ru">
	<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
	
	<script type="text/javascript" src="/test/full/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="/test/full/js/plugins/jqueryui/jquery-ui-1.8.16.custom.min.js"></script>
	
	<!--script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script-->
	<!--script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/system/moment.min.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/system/json.min.js"></script>
	<!--script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/system/jquery-ui.custom.min.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/system/jquery-ui.datepicker-ru.js"></script-->
	<!--script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/system/system.js"></script>
		
	<script type="text/javascript" src="http://altertours.ru/WorkingVersion/js/setup.js"></script>
	
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/controls/combobox.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/controls/listbox.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/proxy/proxy.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/pages/search_form.js"></script>
	<script type="text/javascript" src="http://js.bronni.ru/v2/server-utf8/js/pages/results.js"></script-->
	
	
	

	<script type="text/javascript" src="/test/full/js/sm_loader.js?fullsearch=SL_fullsearch"></script>
	<script type="text/javascript" src="/test/full/js/plugins/cusel.js"></script>
	<script type="text/javascript" src="/test/full/js/plugins/jScrollPane.js"></script>
	<script type="text/javascript" src="/test/full/js/plugins/jquery.mousewheel.js"></script>
	
	
	<link href="http://altertours.ru/WorkingVersion/styles/controls/jquery-ui/jquery-ui.css" rel="stylesheet">
	<link href="http://altertours.ru/WorkingVersion/styles/controls/combobox.css" rel="stylesheet">
	<link href="http://altertours.ru/WorkingVersion/styles/controls/listbox.css" rel="stylesheet">
	<link href="http://altertours.ru/WorkingVersion/styles/design.css" rel="stylesheet">
	<link href="http://altertours.ru/WorkingVersion/styles/search_form.css" rel="stylesheet">
	<link href="http://altertours.ru/WorkingVersion/styles/results.css" rel="stylesheet">
</head>
<body>

<style>

	body{margin: 0px;background-image: url("http://altertours.ru/shablon/7meridian/css/images/body_bg.jpg");background-attachment: fixed; font-family:tahoma;}

	.header{
	  background-image: url("http://altertours.ru/shablon/7meridian/css/images/header_bg.jpg");
    height: 240px;
    margin: 0 auto;
    position: relative;
    width: 967px;
	}
	.phone_block
	{
	height: 70px;
    padding: 3px;
    position: absolute;
    right: 155px;
    text-align: right;
    top: 40px;
    width: 200px;
    z-index: 1;
	}
	.phone_block .caption , .schedule_block .caption
	{
		color: #5A5A5A;
		text-align: right;
	}
	.phone_block .code {
    color: #848483;
    font-size: 14px;
	}
	.phone_block .num {
    color: #E67817;
    font-size: 30px;
	}
	.schedule_block {
    color: #1D7E1E;
    height: 70px;
    padding: 3px;
    position: absolute;
    right: 15px;
    text-align: right;
    top: 40px;
    width: 130px;
	}
	.copyrating_block {
    font-size: 11px;
    left: 0;
    position: absolute;
    top: 30px;
	}
	.footer {
    color: #FFFFFF;
    height: 100px;
    margin: 0 auto;
    position: relative;
    width: 950px;
	}
	.footer .contacts_block {
    font-size: 11px;
    position: absolute;
    right: 0;
    text-align: right;
    top: 20px;
	}
	.footer .contacts_block span {
    font-size: 18px;
	}
	.menu {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/menu_bg.jpg");
		border-radius: 3px 3px 3px 3px;
		color: #FFFEFE;
		height: 37px;
		margin: -60px auto 0;
		position: relative;
		width: 950px;
	}
	.menu_table {
		height: 37px;
		width: 100%;
		border-collaspe: collapse;
	}
	.menu_table tr td {
		padding: 0;
		text-align: center;
		vertical-align: middle;
	}
	.general_menu_link {
		color: #FFFFFF!important;
		display: block;
		font-size: 12px;
		height: 17px;
		padding: 10px 0;
		position: relative;
		text-align: center;
		text-decoration: none!important;
	}
	.general_menu_link:hover {
		color: #9F4D04;
		text-decoration: underline!important;
	}
	.active_false {
		display: none;
		left: 47%;
		position: absolute;
		top: 0;
	}
	.active_true {
		display: inline;
	}
	.tour_money_navigation {
		background-color: #FBE37F;
		border-radius: 3px 3px 3px 3px;
		height: 50px;
		margin: 0 auto;
		margin-top: 23px;
	}
	.tour_money_navigation_table {
		margin: 0 4px;
		width: 100%;
		border-collaspe: collapse;
	}
	.tour_money_navigation_table tr td {
		padding: 6px 0;
	}
	.tour_money_navigation_table tr td a {
		color: #FFFFFF;
		display: block;
		font-size: 12px;
		height: 28px;
		padding-left: 22px;
		padding-top: 9px;
		text-align: center;
		width: 127px;
	}
	a.orange_plah {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/orange_plah.gif");
	}
	a.green_plach {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/green_plah.gif")
	}
	a.red_plah {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/red_plah.gif")
	}
	a.rose_plah {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/rose_plah.gif")
	}
	a.purple_plah {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/purple_plah.gif")
	}
	a.aqua_plah {
		background-image: url("http://altertours.ru/shablon/7meridian/css/images/aqua_plah.gif")
	}
</style>
<script>
var brResultsObj;
$(document).ready(function(){
	new SearchForm({ dom: "#bronni-search-form" }).Init();
	brResultsObj = new Results({ dom: "#bronni-results" });
	$( "#bronni-results" ).css( "display", "none" );
	$('.br-order-button').click();
	var content = $('body');
	var scrollTo = content[0].scrollHeight-content[0].clientHeight;
	console.log(scrollTo);
	content.scrollTop(scrollTo);
});
	
function OpenResults(event) {
	var obj = event.data.parent;
	var dictionary = obj.CreateDictionary();
    
	brResultsObj._searchFilter = CreateSearchFilterFromDictionary(dictionary);
	brResultsObj.Init();
	$( "#bronni-results" ).css( "display", "" );
}	
</script>

<div style="width: 967px; margin: 0 auto;background-color: #fff;padding-bottom: 1px;">
	<div class="header">
						<div style="position: absolute;top: 135px;left: 270px;color: #7B9D2F;"> В туризме с 1994 </div>
						<a style="position: absolute;top: 40px;left: 10px;width: 425px;height: 130px;" href="http://altertours.ru/index.php"></a>
						<div class="top">

	</div>
						<div class="phone_block">
		<div class="caption">
			Телефон в самаре
		</div>
		<div>
				<span class="code">8 (846)</span> <span class="num">333-78-77</span>
		</div>
	</div>
						<div class="schedule_block">
		<div class="caption">
			График работы
		</div>
		<div style="font-size:12px;">
			<span class="days_week">пн-пт</span> <span class="time">10.<sup>00</sup> - 20.<sup>00</sup></span>
		</div>
		<div style="font-size:12px;">
			<span class="days_week">суб</span> <span class="time">10.<sup>00</sup> - 17.<sup>00</sup></span>
		</div>
		<div>
		</div>
	</div>
	</div>
	<div class="menu">
	<table class="menu_table">
		<tbody><tr>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" href="http://altertours.ru/index.php">Главная</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" href="http://altertours.ru/materials/3">Чем мы лучше</a>
			</div></td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" href="http://altertours.ru/materials/2">Авиа</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" target="blank" href="http://www.moresamara.ru/">Круизы</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" href="http://altertours.ru/materials/13">Подготовка к туру</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" href="http://altertours.ru/materials/14">Контакты</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" target="blank" href="http://www.3334333.ru/tur.php">Турагенствам</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" target="blank" href="http://samforum.ru/viewforum.php?f=39">Попутчики</a>
				</div>
			</td>
			<td>
				<div style="position: relative;">
					<img alt="" src="http://altertours.ru/images/active_menu_link.jpg" class="active_false">
					<a class="general_menu_link" target="blank" href="http://www.samforum.ru/">Форум</a>
				</div>
			</td>
		</tr>
	</tbody></table>
</div>





<br>
<!--<script type="text/javascript" src="//ui.sletat.ru/module-4.0/core.js" charset="utf-8"></script>
<script type="text/javascript">sletat.FrameSearch.$create({
  namespace  : "macstyle",
  buyingType : "card",
  useCard    : true
});</script>



    <span class="sletat-copyright">Идет загрузка модуля <a href="http://sletat.ru/" title="поиск туров" target="_blank">поиска туров</a> &hellip;</span>-->
			
<?
	if($_GET){
		if(isset($_GET['city'])){
			echo '<input type="hidden" value="'.$_GET['city'].'" id="get_city_id">';
		}
		else{
			echo '<input type="hidden" value="" id="get_city_id">';
		}
		
		if(isset($_GET['country'])){
			echo '<input type="hidden" value="'.$_GET['country'].'" id="get_country_id">';
		}
		else{
			echo '<input type="hidden" value="" id="get_country_id">';
		}
		
		if(isset($_GET['date'])){
			echo '<input type="hidden" value="'.$_GET['date'].'" id="get_date1">';
		}
		else{
			echo '<input type="hidden" value="" id="get_date1">';
		}
		
		if(isset($_GET['nights_min'])){
			echo '<input type="hidden" value="'.$_GET['nights_min'].'" id="nights_min">';
		}
		else{
			echo '<input type="hidden" value="" id="nights_min">';
		}
		
		if(isset($_GET['nights_max'])){
			echo '<input type="hidden" value="'.$_GET['nights_max'].'" id="nights_max">';
		}
		else{
			echo '<input type="hidden" value="" id="nights_max">';
		}
		
		if(isset($_GET['STA'])){
			echo '<input type="hidden" value="'.$_GET['STA'].'" id="gos">';
		}
		else{
			echo '<input type="hidden" value="" id="gos">';
		}
	}
?>	

<!--div id="SL_fullsearch"></div>
<div class="fs_resulttable"></div>   
<input type="hidden" id="test123" value="1264"-->	
<!--</div>-->

<div data-sletat-module-id="dbfb704c-731b-466c-8514-f81fd985a913"></div>
<script charset="utf-8" src="https://front.sletat.ru/modules/module6/latest/module.js" defer></script>
<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter21564025 = new Ya.Metrika({id:21564025, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/21564025" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>
