<?php
require_once "config.php";

$error_message = "";

if (isset($_POST["smOrder"])){
	$orderid = ProcessOrder();
	if ($orderid != -1)
	{
		header("Location: invoice.php?oid={$orderid}");
		die();
	}
}


function ProcessOrder()
{
	global $error_message;
	$product1Count = $_POST["product_1_count"];
	$product2Count = $_POST["product_2_count"];
	$product3Count = $_POST["product_3_count"];
	$product1Check = $_POST["product_1_check"];
	$product2Check = $_POST["product_2_check"];
	$product3Check = $_POST["product_3_check"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$landline = $_POST["landline"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];
	$mobile = $_POST["mobile"];
	$agree_pay = $_POST["agree_pay"];
	$agree_term = $_POST["agree_term"];
	
	if ($product1Check != '1' &&
		$product2Check != '1' &&
		$product3Check != '1' || 
		$product1Count <= 0 &&  
		$product2Count <= 0 &&  
		$product3Count <= 0)
	{
		$error_message = "Please select a product";
		return -1;
	}
	
	if ($product1Check != '1')
		$product1Count = 0;
	if ($product2Check != '1')
		$product2Count = 0;
	if ($product3Check != '1')
		$product3Count = 0;
	
	if (empty($firstname) ||
		empty($lastname) ||
		empty($email) ||
		empty($address1) ||
		empty($city) ||
		empty($state) ||
		empty($zip) ||
		empty($country))
	{
		$error_message = "Please enter all required fields";
		return -1;
	}
	
	if (empty($agree_pay))
	{
		$error_message = "Do you agree to pay cash on delivery?";
		return -1;
	}
	
	
	if (empty($agree_term))
	{
		$error_message = "Do you agree to the terms and condition?";
		return -1;
	}
	
	$ID = uniqid();
	mysql_query("INSERT INTO `order` SET 
		 order_id='{$ID}',
		 item_1_count='{$product1Count}',
		 item_2_count='{$product2Count}',
		 item_3_count='{$product3Count}',
		 item_1_price='100',
		 item_2_price='200',
		 item_3_price='300',
		 first_name='{$firstname}',
		 last_name='{$lastname}',
		 address1='{$address1}',
		 address2='{$address2}',
		 city='{$city}',
		 state='{$state}',
		 landline='{$landline}',
		 mobile='{$mobile}',
		 email='{$email}',
		 zip='{$zip}',
		 country='{$country}'");
	return $ID;
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Wild-Water&#153; - Drink Smart</title>
    <link href="css/global.css" rel="stylesheet" type="text/css" />
    
<script src="http://max.jotfor.ms/min/g=jotform?3.1.1156" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
      JotForm.totalCounter({"input_3_1001":{"price":"100"},"input_3_1002":{"price":"200"},"input_3_1003":{"price":"300"}});
      $('input_5').hint('ex: myname@example.com');
   });
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="http://max.jotfor.ms/min/g=formCss?3.1.1156" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://jotform.us/css/styles/nova.css?3.1.1156" />
<style type="text/css">
    .form-label{
        width:150px !important;
    }
    .form-label-left{
        width:150px !important;
    }
    .form-line{
        
    }
    .form-label-right{
        width:150px !important;
    }
    .form-all{
        width:590px;
        color:#555 !important;
        font-family:'Lucida Grande',' Lucida Sans Unicode',' Lucida Sans',' Verdana',' Tahoma',' sans-serif';
        font-size:14px;
        float: left;
        float: left;
    }
.form-line1 {        padding-top:12px;
        padding-bottom:12px;
}
</style>


    

<script  type='text/javascript'>	
/* JavaScript for Chapter 3 */

$(document).ready(function(){
	dynamicFaq();
});

function dynamicFaq(){
	$('dd').hide();
	$('dt').bind('click', function(){
		$(this).toggleClass('open').next().slideToggle();;
	});
}</script>

    <body>
    <div class="div-inside-company" id="bg-tropical">
      <div class="header-navigation">
       <a href="index.html"><h1><div class="header-navigation-logo" title="Wild-Water&#153; vitam-in-water"><span>Wild-Water&#153; vitam-in-water</span></div></h1></a>
        <div class="header-navigation-links">
          <div class="menu-top">
            <ul>
              <li ><a href="index_tropical_citrus.html" class="tropical">Tropical Citrus</a></li>
              <li ><a href="index_lemonade.html" class="lemonade">Lemonade</a></li>
              <li ><a href="index_dragonfruit.html" class="dragonfruit">Dragonfruit</a></li>
            </ul>
          </div>
          <div class="div-company-contact">
            <ul>
              <li class="company"><a href="company.html">Company</a></li>
              <li class="company"><a href="faqs.html">FAQ's</a></li>
              <li class="contact"><a href="contact.html">Contact</a></li>
              <li class="dealer"><a href="dealer_locator.html">Dealer Locator</a></li>
            </ul>
            <ul>
              <li class="dealer"><a href="online_order.html">Online Order</a></li>
            </ul>
          </div>
          <div class="div-facebook-twitter">
            <ul>
              <li><a class="facebook" title="Facebook" href="http://www.facebook.com/wildwaterindia"></a></li>
              <li><a class="twitter" title="Twitter" href="http://twitter.com/wildwaterindia"></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="div-inside">
        <div class="div-middle-home-left-side">
          <div class="div-link-home-inside2"><a class="color-white" href="index.html">Home</a></div></div>
        <div class="div-content-company-paragraph3"> 
          <h1>Order Online <br />
          </h1>
          <h3>Payment on delivery, No credit card needed!</h3>
          <strong><br />
          </strong>
          <form class="jotform-form" method="post" >
            <input type="hidden" name="formID" value="23558241760151" />
  <div class="form-all">
  	<?php
  	if ($error_message != "")
  		echo "<div style=\"color: red;\">*{$error_message}</div>";
  	?>
    <ul class="form-section">
      <li class="form-line" id="id_3">
        <label class="form-label-left" id="label_3" for="input_3"> WildWater&#153; Flavours</label>
        <div id="cid_3" class="form-input"><span class="form-product-item">
        
    <input type="number" name="product_1_count" style="width:40px;" value="<?php echo isset($_POST["product_1_count"]) ? $_POST["product_1_count"] : "1";?>" />    
    <input class="form-checkbox" type="checkbox" <?php echo isset($_POST["product_1_check"]) ? 'checked="checked"' : ""; ?> name="product_1_check" value="1" />
          </span><strong>
          <label for="input_3_1001"><span class="color-yellow">Tropical Citrus</span></label>
          </strong><span class="form-product-item"><strong>
          <label for="input_3_1001"> flavour</label>
          </strong>
          <label for="input_3_1001">  (8 In 1 Case)<span class="form-product-details"><b>
                  *840 Rs .</b></span>
            </label>
          </span>
          <br /><span class="form-product-item">
          
          
        <input type="number" name="product_2_count" style="width:40px;" value="<?php echo isset($_POST["product_2_count"]) ? $_POST["product_2_count"] : "1";?>" />  
        <input class="form-checkbox" type="checkbox" <?php echo isset($_POST["product_2_check"]) ? 'checked="checked"' : ""; ?> name="product_2_check" value="1" />
          </span><span class="color-green"><strong>Lemonade</strong></span><span class="form-product-item"><strong> flavour </strong>(8 In 1 Case)
<label for="input_3_1002"><span class="form-product-details"><b>
                  *840
                  Rs.
                </b></span>
          </label>
          </span>
          <br /><span class="form-product-item"><input type="number" name="product_3_count" style="width:40px;" value="<?php echo isset($_POST["product_3_count"]) ? $_POST["product_3_count"] : "1";?>" />
          
          
          <input class="form-checkbox" type="checkbox" <?php echo isset($_POST["product_3_check"]) ? 'checked="checked"' : ""; ?> name="product_3_check" value="1" />
            </span>
          <label for="input_3_1003"><span class="color-red"><strong>Dragonfruit </strong></span></label>
          <span class="form-product-item">
          <label for="input_3_1003"><strong>Flavour</strong> (8 In 1 Case) <span class="form-product-details"><b>* 840 Rs.</b></span>
          </label>
          </span>
          <br />
          <hr>
          <div id="cid_2" class="form-input-wide"> <span>
              <input class="form-checkbox" type="checkbox" id="input_3_" name="agree_pay" value="1" />
            </span>* I agree to pay cash on delivery          </div>
          <table summary="" style="display:none" id="creditCardTable" class="form-address-table" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="2" align="left">
                Credit Card
              </th>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox" type="text" name="q3_myProducts3[cc_firstName]" id="input_3_cc_firstName" size="20" />
                  <label class="form-sub-label" for="input_3_cc_firstName" id="sublabel_cc_firstName"> First Name </label></span>
              </td>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox" type="text" name="q3_myProducts3[cc_lastName]" id="input_3_cc_lastName" size="20" />
                  <label class="form-sub-label" for="input_3_cc_lastName" id="sublabel_cc_lastName"> Last Name </label></span>
              </td>
            </tr>
            <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox" type="text" name="q3_myProducts3[cc_number]" id="input_3_cc_number" size="35" />
                -
                <label class="form-sub-label" for="input_3_cc_number" id="sublabel_cc_number"> Credit Card Number </label></span><span class="form-sub-label-container"><input class="form-textbox" type="text" name="q3_myProducts3[cc_ccv]" id="input_3_cc_ccv" size="6" />
                <label class="form-sub-label" for="input_3_cc_ccv" id="sublabel_cc_ccv"> Security Code </label></span>
            </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><select class="form-dropdown" name="q3_myProducts3[cc_exp_month]" id="input_3_cc_exp_month">
                    <option>  </option>
                    <option value="January"> January </option>
                    <option value="February"> February </option>
                    <option value="March"> March </option>
                    <option value="April"> April </option>
                    <option value="May"> May </option>
                    <option value="June"> June </option>
                    <option value="July"> July </option>
                    <option value="August"> August </option>
                    <option value="September"> September </option>
                    <option value="October"> October </option>
                    <option value="November"> November </option>
                    <option value="December"> December </option>
                  </select>
                  /
                  <label class="form-sub-label" for="input_3_cc_exp_month" id="sublabel_cc_exp_month"> Expiration Month </label></span><span class="form-sub-label-container"><select class="form-dropdown" name="q3_myProducts3[cc_exp_year]" id="input_3_cc_exp_year">
                    <option>  </option>
                    <option value="2012"> 2012 </option>
                    <option value="2013"> 2013 </option>
                    <option value="2014"> 2014 </option>
                    <option value="2015"> 2015 </option>
                    <option value="2016"> 2016 </option>
                    <option value="2017"> 2017 </option>
                    <option value="2018"> 2018 </option>
                    <option value="2019"> 2019 </option>
                    <option value="2020"> 2020 </option>
                    <option value="2021"> 2021 </option>
                  </select>
                  <label class="form-sub-label" for="input_3_cc_exp_year" id="sublabel_cc_exp_year"> Expiration Year </label></span>
              </td>
            </tr>
            <tr>
              <th colspan="2" align="left">
                Billing Address
              </th>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox form-address-line" type="text" name="q3_myProducts3[addr_line1]" id="input_3_addr_line1" />
                  <label class="form-sub-label" for="input_3_addr_line1" id="sublabel_addr_line1"> Street Address </label></span>
              </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox form-address-line" type="text" name="q3_myProducts3[addr_line2]" id="input_3_addr_line2" size="46" />
                  <label class="form-sub-label" for="input_3_addr_line2" id="sublabel_addr_line2"> Street Address Line 2 </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox form-address-city" type="text" name="q3_myProducts3[city]" id="input_3_city" size="21" />
                  <label class="form-sub-label" for="input_3_city" id="sublabel_city"> City </label></span>
              </td>
              <td><span class="form-sub-label-container"><input class="form-textbox form-address-state" type="text" name="q3_myProducts3[state]" id="input_3_state" size="22" />
                  <label class="form-sub-label" for="input_3_state" id="sublabel_state"> State / Province </label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox form-address-postal" type="text" name="q3_myProducts3[postal]" id="input_3_postal" size="10" />
                  <label class="form-sub-label" for="input_3_postal" id="sublabel_postal"> Postal / Zip Code </label></span>
              </td>
              <td><span class="form-sub-label-container"><select class="form-dropdown form-address-country"  id="input_3_country">
                    <option value="" selected> Please Select </option>
                    <option value="United States"> United States </option>
                    <option value="Abkhazia"> Abkhazia </option>
                    <option value="Afghanistan"> Afghanistan </option>
                    <option value="Albania"> Albania </option>
                    <option value="Algeria"> Algeria </option>
                    <option value="American Samoa"> American Samoa </option>
                    <option value="Andorra"> Andorra </option>
                    <option value="Angola"> Angola </option>
                    <option value="Anguilla"> Anguilla </option>
                    <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                    <option value="Argentina"> Argentina </option>
                    <option value="Armenia"> Armenia </option>
                    <option value="Aruba"> Aruba </option>
                    <option value="Australia"> Australia </option>
                    <option value="Austria"> Austria </option>
                    <option value="Azerbaijan"> Azerbaijan </option>
                    <option value="The Bahamas"> The Bahamas </option>
                    <option value="Bahrain"> Bahrain </option>
                    <option value="Bangladesh"> Bangladesh </option>
                    <option value="Barbados"> Barbados </option>
                    <option value="Belarus"> Belarus </option>
                    <option value="Belgium"> Belgium </option>
                    <option value="Belize"> Belize </option>
                    <option value="Benin"> Benin </option>
                    <option value="Bermuda"> Bermuda </option>
                    <option value="Bhutan"> Bhutan </option>
                    <option value="Bolivia"> Bolivia </option>
                    <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                    <option value="Botswana"> Botswana </option>
                    <option value="Brazil"> Brazil </option>
                    <option value="Brunei"> Brunei </option>
                    <option value="Bulgaria"> Bulgaria </option>
                    <option value="Burkina Faso"> Burkina Faso </option>
                    <option value="Burundi"> Burundi </option>
                    <option value="Cambodia"> Cambodia </option>
                    <option value="Cameroon"> Cameroon </option>
                    <option value="Canada"> Canada </option>
                    <option value="Cape Verde"> Cape Verde </option>
                    <option value="Cayman Islands"> Cayman Islands </option>
                    <option value="Central African Republic"> Central African Republic </option>
                    <option value="Chad"> Chad </option>
                    <option value="Chile"> Chile </option>
                    <option value="People's Republic of China"> People's Republic of China </option>
                    <option value="Republic of China"> Republic of China </option>
                    <option value="Christmas Island"> Christmas Island </option>
                    <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                    <option value="Colombia"> Colombia </option>
                    <option value="Comoros"> Comoros </option>
                    <option value="Congo"> Congo </option>
                    <option value="Cook Islands"> Cook Islands </option>
                    <option value="Costa Rica"> Costa Rica </option>
                    <option value="Cote d'Ivoire"> Cote d'Ivoire </option>
                    <option value="Croatia"> Croatia </option>
                    <option value="Cuba"> Cuba </option>
                    <option value="Cyprus"> Cyprus </option>
                    <option value="Czech Republic"> Czech Republic </option>
                    <option value="Denmark"> Denmark </option>
                    <option value="Djibouti"> Djibouti </option>
                    <option value="Dominica"> Dominica </option>
                    <option value="Dominican Republic"> Dominican Republic </option>
                    <option value="Ecuador"> Ecuador </option>
                    <option value="Egypt"> Egypt </option>
                    <option value="El Salvador"> El Salvador </option>
                    <option value="Equatorial Guinea"> Equatorial Guinea </option>
                    <option value="Eritrea"> Eritrea </option>
                    <option value="Estonia"> Estonia </option>
                    <option value="Ethiopia"> Ethiopia </option>
                    <option value="Falkland Islands"> Falkland Islands </option>
                    <option value="Faroe Islands"> Faroe Islands </option>
                    <option value="Fiji"> Fiji </option>
                    <option value="Finland"> Finland </option>
                    <option value="France"> France </option>
                    <option value="French Polynesia"> French Polynesia </option>
                    <option value="Gabon"> Gabon </option>
                    <option value="The Gambia"> The Gambia </option>
                    <option value="Georgia"> Georgia </option>
                    <option value="Germany"> Germany </option>
                    <option value="Ghana"> Ghana </option>
                    <option value="Gibraltar"> Gibraltar </option>
                    <option value="Greece"> Greece </option>
                    <option value="Greenland"> Greenland </option>
                    <option value="Grenada"> Grenada </option>
                    <option value="Guadeloupe"> Guadeloupe </option>
                    <option value="Guam"> Guam </option>
                    <option value="Guatemala"> Guatemala </option>
                    <option value="Guernsey"> Guernsey </option>
                    <option value="Guinea"> Guinea </option>
                    <option value="Guinea-Bissau"> Guinea-Bissau </option>
                    <option value="Guyana"> Guyana </option>
                    <option value="Haiti"> Haiti </option>
                    <option value="Honduras"> Honduras </option>
                    <option value="Hong Kong"> Hong Kong </option>
                    <option value="Hungary"> Hungary </option>
                    <option value="Iceland"> Iceland </option>
                    <option value="India"> India </option>
                    <option value="Indonesia"> Indonesia </option>
                    <option value="Iran"> Iran </option>
                    <option value="Iraq"> Iraq </option>
                    <option value="Ireland"> Ireland </option>
                    <option value="Israel"> Israel </option>
                    <option value="Italy"> Italy </option>
                    <option value="Jamaica"> Jamaica </option>
                    <option value="Japan"> Japan </option>
                    <option value="Jersey"> Jersey </option>
                    <option value="Jordan"> Jordan </option>
                    <option value="Kazakhstan"> Kazakhstan </option>
                    <option value="Kenya"> Kenya </option>
                    <option value="Kiribati"> Kiribati </option>
                    <option value="North Korea"> North Korea </option>
                    <option value="South Korea"> South Korea </option>
                    <option value="Kosovo"> Kosovo </option>
                    <option value="Kuwait"> Kuwait </option>
                    <option value="Kyrgyzstan"> Kyrgyzstan </option>
                    <option value="Laos"> Laos </option>
                    <option value="Latvia"> Latvia </option>
                    <option value="Lebanon"> Lebanon </option>
                    <option value="Lesotho"> Lesotho </option>
                    <option value="Liberia"> Liberia </option>
                    <option value="Libya"> Libya </option>
                    <option value="Liechtenstein"> Liechtenstein </option>
                    <option value="Lithuania"> Lithuania </option>
                    <option value="Luxembourg"> Luxembourg </option>
                    <option value="Macau"> Macau </option>
                    <option value="Macedonia"> Macedonia </option>
                    <option value="Madagascar"> Madagascar </option>
                    <option value="Malawi"> Malawi </option>
                    <option value="Malaysia"> Malaysia </option>
                    <option value="Maldives"> Maldives </option>
                    <option value="Mali"> Mali </option>
                    <option value="Malta"> Malta </option>
                    <option value="Marshall Islands"> Marshall Islands </option>
                    <option value="Martinique"> Martinique </option>
                    <option value="Mauritania"> Mauritania </option>
                    <option value="Mauritius"> Mauritius </option>
                    <option value="Mayotte"> Mayotte </option>
                    <option value="Mexico"> Mexico </option>
                    <option value="Micronesia"> Micronesia </option>
                    <option value="Moldova"> Moldova </option>
                    <option value="Monaco"> Monaco </option>
                    <option value="Mongolia"> Mongolia </option>
                    <option value="Montenegro"> Montenegro </option>
                    <option value="Montserrat"> Montserrat </option>
                    <option value="Morocco"> Morocco </option>
                    <option value="Mozambique"> Mozambique </option>
                    <option value="Myanmar"> Myanmar </option>
                    <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                    <option value="Namibia"> Namibia </option>
                    <option value="Nauru"> Nauru </option>
                    <option value="Nepal"> Nepal </option>
                    <option value="Netherlands"> Netherlands </option>
                    <option value="Netherlands Antilles"> Netherlands Antilles </option>
                    <option value="New Caledonia"> New Caledonia </option>
                    <option value="New Zealand"> New Zealand </option>
                    <option value="Nicaragua"> Nicaragua </option>
                    <option value="Niger"> Niger </option>
                    <option value="Nigeria"> Nigeria </option>
                    <option value="Niue"> Niue </option>
                    <option value="Norfolk Island"> Norfolk Island </option>
                    <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                    <option value="Northern Mariana"> Northern Mariana </option>
                    <option value="Norway"> Norway </option>
                    <option value="Oman"> Oman </option>
                    <option value="Pakistan"> Pakistan </option>
                    <option value="Palau"> Palau </option>
                    <option value="Palestine"> Palestine </option>
                    <option value="Panama"> Panama </option>
                    <option value="Papua New Guinea"> Papua New Guinea </option>
                    <option value="Paraguay"> Paraguay </option>
                    <option value="Peru"> Peru </option>
                    <option value="Philippines"> Philippines </option>
                    <option value="Pitcairn Islands"> Pitcairn Islands </option>
                    <option value="Poland"> Poland </option>
                    <option value="Portugal"> Portugal </option>
                    <option value="Puerto Rico"> Puerto Rico </option>
                    <option value="Qatar"> Qatar </option>
                    <option value="Romania"> Romania </option>
                    <option value="Russia"> Russia </option>
                    <option value="Rwanda"> Rwanda </option>
                    <option value="Saint Barthelemy"> Saint Barthelemy </option>
                    <option value="Saint Helena"> Saint Helena </option>
                    <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                    <option value="Saint Lucia"> Saint Lucia </option>
                    <option value="Saint Martin"> Saint Martin </option>
                    <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                    <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                    <option value="Samoa"> Samoa </option>
                    <option value="San Marino"> San Marino </option>
                    <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                    <option value="Saudi Arabia"> Saudi Arabia </option>
                    <option value="Senegal"> Senegal </option>
                    <option value="Serbia"> Serbia </option>
                    <option value="Seychelles"> Seychelles </option>
                    <option value="Sierra Leone"> Sierra Leone </option>
                    <option value="Singapore"> Singapore </option>
                    <option value="Slovakia"> Slovakia </option>
                    <option value="Slovenia"> Slovenia </option>
                    <option value="Solomon Islands"> Solomon Islands </option>
                    <option value="Somalia"> Somalia </option>
                    <option value="Somaliland"> Somaliland </option>
                    <option value="South Africa"> South Africa </option>
                    <option value="South Ossetia"> South Ossetia </option>
                    <option value="Spain"> Spain </option>
                    <option value="Sri Lanka"> Sri Lanka </option>
                    <option value="Sudan"> Sudan </option>
                    <option value="Suriname"> Suriname </option>
                    <option value="Svalbard"> Svalbard </option>
                    <option value="Swaziland"> Swaziland </option>
                    <option value="Sweden"> Sweden </option>
                    <option value="Switzerland"> Switzerland </option>
                    <option value="Syria"> Syria </option>
                    <option value="Taiwan"> Taiwan </option>
                    <option value="Tajikistan"> Tajikistan </option>
                    <option value="Tanzania"> Tanzania </option>
                    <option value="Thailand"> Thailand </option>
                    <option value="Timor-Leste"> Timor-Leste </option>
                    <option value="Togo"> Togo </option>
                    <option value="Tokelau"> Tokelau </option>
                    <option value="Tonga"> Tonga </option>
                    <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                    <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                    <option value="Tristan da Cunha"> Tristan da Cunha </option>
                    <option value="Tunisia"> Tunisia </option>
                    <option value="Turkey"> Turkey </option>
                    <option value="Turkmenistan"> Turkmenistan </option>
                    <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                    <option value="Tuvalu"> Tuvalu </option>
                    <option value="Uganda"> Uganda </option>
                    <option value="Ukraine"> Ukraine </option>
                    <option value="United Arab Emirates"> United Arab Emirates </option>
                    <option value="United Kingdom"> United Kingdom </option>
                    <option value="Uruguay"> Uruguay </option>
                    <option value="Uzbekistan"> Uzbekistan </option>
                    <option value="Vanuatu"> Vanuatu </option>
                    <option value="Vatican City"> Vatican City </option>
                    <option value="Venezuela"> Venezuela </option>
                    <option value="Vietnam"> Vietnam </option>
                    <option value="British Virgin Islands"> British Virgin Islands </option>
                    <option value="US Virgin Islands"> US Virgin Islands </option>
                    <option value="Wallis and Futuna"> Wallis and Futuna </option>
                    <option value="Western Sahara"> Western Sahara </option>
                    <option value="Yemen"> Yemen </option>
                    <option value="Zambia"> Zambia </option>
                    <option value="Zimbabwe"> Zimbabwe </option>
                    <option value="other"> Other </option>
                  </select>
                  <label class="form-sub-label" for="input_3_country" id="sublabel_country"> Country </label></span>
              </td>
            </tr>
      </table>
        </div>
      </li>
      <li class="form-line"><strong>
              Contact and Deliver Information </strong><br />
              <br />
              <div id="cid_4" class="form-input"><span class="form-sub-label-container"><input class="form-textbox" type="text" size="10" name="firstname" value="<?php echo (isset($_POST["firstname"]) ? $_POST["firstname"] : "");?>" id="first_4" />
          <label class="form-sub-label" for="first_4" id="sublabel_first"> First Name </label></span><span class="form-sub-label-container"><input class="form-textbox" type="text" size="15" name="lastname" value="<?php echo (isset($_POST["lastname"]) ? $_POST["lastname"] : "");?>" id="last_4" />
            <label class="form-sub-label" for="last_4" id="sublabel_last"> Last Name </label></span>
    </div>
      </li>
      <li class="form-line" id="id_5">
        <div id="cid_5" class="form-input"><span class="form-sub-label-container">
          <input class="form-textbox form-address-line" type="text" name="email" value="<?php echo (isset($_POST["email"]) ? $_POST["email"] : "");?>" id="input_6_addr_line3" />
          <label class="form-sub-label" for="input_6_addr_line3" id="sublabel_addr_line1"> Your Email </label>
        </span><span class="form-sub-label-container">
          </span> </div>
      </li>
      <li class="form-line" id="id_6">
        <div id="cid_6" class="form-input">
          <table summary="" class="form-address-table" border="0" cellpadding="0" cellspacing="0">
            <tra
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox form-address-line" type="text" name="address1" value="<?php echo (isset($_POST["address1"]) ? $_POST["address1"] : "");?>" id="input_6_addr_line1" />
                  <label class="form-sub-label" for="input_6_addr_line1" id="sublabel_addr_line1"> Street Address </label></span>
              </td>
            </tr>
            <tr>
              <td colspan="2"><span class="form-sub-label-container"><input class="form-textbox form-address-line" type="text" name="address2"  value="<?php echo (isset($_POST["address2"]) ? $_POST["address2"] : "");?>" size="46" />

                  <label class="form-sub-label" for="input_6_addr_line2" id="sublabel_addr_line2"> Street Address Line 2 </label></span>
              </td>
            </tr>
            <tr>
              <td><span class="form-sub-label-container">
                <input class="form-textbox form-address-city" type="text" name="city" value="<?php echo (isset($_POST["city"]) ? $_POST["city"] : "");?>" size="21" />
                <label class="form-sub-label" for="input_6_city2" id="sublabel_city"> City </label>
              </span></td>
              <td><span class="form-sub-label-container">
                <input class="form-textbox form-address-state" type="text"  name="state" value="<?php echo (isset($_POST["state"]) ? $_POST["state"] : "");?>" size="22" />
                <label class="form-sub-label" for="input_6_state2" id="sublabel_state"> State / Province </label>
              </span></td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox form-address-city" type="text"  name="landline" value="<?php echo (isset($_POST["landline"]) ? $_POST["landline"] : "");?>" size="21" />
                  <label class="form-sub-label" for="input_6_city" id="sublabel_city"> Landline</label></span>
              </td>
              <td><span class="form-sub-label-container"><input class="form-textbox form-address-state" type="text" name="mobile" value="<?php echo (isset($_POST["mobile"]) ? $_POST["mobile"] : "");?>" size="22" />
                  <label class="form-sub-label" for="input_6_state" id="sublabel_state"> Mobile</label></span>
              </td>
            </tr>
            <tr>
              <td width="50%"><span class="form-sub-label-container"><input class="form-textbox form-address-postal" type="text" name="zip" value="<?php echo (isset($_POST["zip"]) ? $_POST["zip"] : "");?>" size="10" />
                  <label class="form-sub-label" for="input_6_postal" id="sublabel_postal"> Postal / Zip Code </label></span>
              </td>
              <td><span class="form-sub-label-container"><select class="form-dropdown form-address-country" id="country" name="country">
                    <option value="" selected> Please Select </option>
                    <option value="United States"> United States </option>
                    <option value="Abkhazia"> Abkhazia </option>
                    <option value="Afghanistan"> Afghanistan </option>
                    <option value="Albania"> Albania </option>
                    <option value="Algeria"> Algeria </option>
                    <option value="American Samoa"> American Samoa </option>
                    <option value="Andorra"> Andorra </option>
                    <option value="Angola"> Angola </option>
                    <option value="Anguilla"> Anguilla </option>
                    <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                    <option value="Argentina"> Argentina </option>
                    <option value="Armenia"> Armenia </option>
                    <option value="Aruba"> Aruba </option>
                    <option value="Australia"> Australia </option>
                    <option value="Austria"> Austria </option>
                    <option value="Azerbaijan"> Azerbaijan </option>
                    <option value="The Bahamas"> The Bahamas </option>
                    <option value="Bahrain"> Bahrain </option>
                    <option value="Bangladesh"> Bangladesh </option>
                    <option value="Barbados"> Barbados </option>
                    <option value="Belarus"> Belarus </option>
                    <option value="Belgium"> Belgium </option>
                    <option value="Belize"> Belize </option>
                    <option value="Benin"> Benin </option>
                    <option value="Bermuda"> Bermuda </option>
                    <option value="Bhutan"> Bhutan </option>
                    <option value="Bolivia"> Bolivia </option>
                    <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                    <option value="Botswana"> Botswana </option>
                    <option value="Brazil"> Brazil </option>
                    <option value="Brunei"> Brunei </option>
                    <option value="Bulgaria"> Bulgaria </option>
                    <option value="Burkina Faso"> Burkina Faso </option>
                    <option value="Burundi"> Burundi </option>
                    <option value="Cambodia"> Cambodia </option>
                    <option value="Cameroon"> Cameroon </option>
                    <option value="Canada"> Canada </option>
                    <option value="Cape Verde"> Cape Verde </option>
                    <option value="Cayman Islands"> Cayman Islands </option>
                    <option value="Central African Republic"> Central African Republic </option>
                    <option value="Chad"> Chad </option>
                    <option value="Chile"> Chile </option>
                    <option value="People's Republic of China"> People's Republic of China </option>
                    <option value="Republic of China"> Republic of China </option>
                    <option value="Christmas Island"> Christmas Island </option>
                    <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                    <option value="Colombia"> Colombia </option>
                    <option value="Comoros"> Comoros </option>
                    <option value="Congo"> Congo </option>
                    <option value="Cook Islands"> Cook Islands </option>
                    <option value="Costa Rica"> Costa Rica </option>
                    <option value="Cote d'Ivoire"> Cote d'Ivoire </option>
                    <option value="Croatia"> Croatia </option>
                    <option value="Cuba"> Cuba </option>
                    <option value="Cyprus"> Cyprus </option>
                    <option value="Czech Republic"> Czech Republic </option>
                    <option value="Denmark"> Denmark </option>
                    <option value="Djibouti"> Djibouti </option>
                    <option value="Dominica"> Dominica </option>
                    <option value="Dominican Republic"> Dominican Republic </option>
                    <option value="Ecuador"> Ecuador </option>
                    <option value="Egypt"> Egypt </option>
                    <option value="El Salvador"> El Salvador </option>
                    <option value="Equatorial Guinea"> Equatorial Guinea </option>
                    <option value="Eritrea"> Eritrea </option>
                    <option value="Estonia"> Estonia </option>
                    <option value="Ethiopia"> Ethiopia </option>
                    <option value="Falkland Islands"> Falkland Islands </option>
                    <option value="Faroe Islands"> Faroe Islands </option>
                    <option value="Fiji"> Fiji </option>
                    <option value="Finland"> Finland </option>
                    <option value="France"> France </option>
                    <option value="French Polynesia"> French Polynesia </option>
                    <option value="Gabon"> Gabon </option>
                    <option value="The Gambia"> The Gambia </option>
                    <option value="Georgia"> Georgia </option>
                    <option value="Germany"> Germany </option>
                    <option value="Ghana"> Ghana </option>
                    <option value="Gibraltar"> Gibraltar </option>
                    <option value="Greece"> Greece </option>
                    <option value="Greenland"> Greenland </option>
                    <option value="Grenada"> Grenada </option>
                    <option value="Guadeloupe"> Guadeloupe </option>
                    <option value="Guam"> Guam </option>
                    <option value="Guatemala"> Guatemala </option>
                    <option value="Guernsey"> Guernsey </option>
                    <option value="Guinea"> Guinea </option>
                    <option value="Guinea-Bissau"> Guinea-Bissau </option>
                    <option value="Guyana"> Guyana </option>
                    <option value="Haiti"> Haiti </option>
                    <option value="Honduras"> Honduras </option>
                    <option value="Hong Kong"> Hong Kong </option>
                    <option value="Hungary"> Hungary </option>
                    <option value="Iceland"> Iceland </option>
                    <option value="India"> India </option>
                    <option value="Indonesia"> Indonesia </option>
                    <option value="Iran"> Iran </option>
                    <option value="Iraq"> Iraq </option>
                    <option value="Ireland"> Ireland </option>
                    <option value="Israel"> Israel </option>
                    <option value="Italy"> Italy </option>
                    <option value="Jamaica"> Jamaica </option>
                    <option value="Japan"> Japan </option>
                    <option value="Jersey"> Jersey </option>
                    <option value="Jordan"> Jordan </option>
                    <option value="Kazakhstan"> Kazakhstan </option>
                    <option value="Kenya"> Kenya </option>
                    <option value="Kiribati"> Kiribati </option>
                    <option value="North Korea"> North Korea </option>
                    <option value="South Korea"> South Korea </option>
                    <option value="Kosovo"> Kosovo </option>
                    <option value="Kuwait"> Kuwait </option>
                    <option value="Kyrgyzstan"> Kyrgyzstan </option>
                    <option value="Laos"> Laos </option>
                    <option value="Latvia"> Latvia </option>
                    <option value="Lebanon"> Lebanon </option>
                    <option value="Lesotho"> Lesotho </option>
                    <option value="Liberia"> Liberia </option>
                    <option value="Libya"> Libya </option>
                    <option value="Liechtenstein"> Liechtenstein </option>
                    <option value="Lithuania"> Lithuania </option>
                    <option value="Luxembourg"> Luxembourg </option>
                    <option value="Macau"> Macau </option>
                    <option value="Macedonia"> Macedonia </option>
                    <option value="Madagascar"> Madagascar </option>
                    <option value="Malawi"> Malawi </option>
                    <option value="Malaysia"> Malaysia </option>
                    <option value="Maldives"> Maldives </option>
                    <option value="Mali"> Mali </option>
                    <option value="Malta"> Malta </option>
                    <option value="Marshall Islands"> Marshall Islands </option>
                    <option value="Martinique"> Martinique </option>
                    <option value="Mauritania"> Mauritania </option>
                    <option value="Mauritius"> Mauritius </option>
                    <option value="Mayotte"> Mayotte </option>
                    <option value="Mexico"> Mexico </option>
                    <option value="Micronesia"> Micronesia </option>
                    <option value="Moldova"> Moldova </option>
                    <option value="Monaco"> Monaco </option>
                    <option value="Mongolia"> Mongolia </option>
                    <option value="Montenegro"> Montenegro </option>
                    <option value="Montserrat"> Montserrat </option>
                    <option value="Morocco"> Morocco </option>
                    <option value="Mozambique"> Mozambique </option>
                    <option value="Myanmar"> Myanmar </option>
                    <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                    <option value="Namibia"> Namibia </option>
                    <option value="Nauru"> Nauru </option>
                    <option value="Nepal"> Nepal </option>
                    <option value="Netherlands"> Netherlands </option>
                    <option value="Netherlands Antilles"> Netherlands Antilles </option>
                    <option value="New Caledonia"> New Caledonia </option>
                    <option value="New Zealand"> New Zealand </option>
                    <option value="Nicaragua"> Nicaragua </option>
                    <option value="Niger"> Niger </option>
                    <option value="Nigeria"> Nigeria </option>
                    <option value="Niue"> Niue </option>
                    <option value="Norfolk Island"> Norfolk Island </option>
                    <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                    <option value="Northern Mariana"> Northern Mariana </option>
                    <option value="Norway"> Norway </option>
                    <option value="Oman"> Oman </option>
                    <option value="Pakistan"> Pakistan </option>
                    <option value="Palau"> Palau </option>
                    <option value="Palestine"> Palestine </option>
                    <option value="Panama"> Panama </option>
                    <option value="Papua New Guinea"> Papua New Guinea </option>
                    <option value="Paraguay"> Paraguay </option>
                    <option value="Peru"> Peru </option>
                    <option value="Philippines"> Philippines </option>
                    <option value="Pitcairn Islands"> Pitcairn Islands </option>
                    <option value="Poland"> Poland </option>
                    <option value="Portugal"> Portugal </option>
                    <option value="Puerto Rico"> Puerto Rico </option>
                    <option value="Qatar"> Qatar </option>
                    <option value="Romania"> Romania </option>
                    <option value="Russia"> Russia </option>
                    <option value="Rwanda"> Rwanda </option>
                    <option value="Saint Barthelemy"> Saint Barthelemy </option>
                    <option value="Saint Helena"> Saint Helena </option>
                    <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                    <option value="Saint Lucia"> Saint Lucia </option>
                    <option value="Saint Martin"> Saint Martin </option>
                    <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                    <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                    <option value="Samoa"> Samoa </option>
                    <option value="San Marino"> San Marino </option>
                    <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                    <option value="Saudi Arabia"> Saudi Arabia </option>
                    <option value="Senegal"> Senegal </option>
                    <option value="Serbia"> Serbia </option>
                    <option value="Seychelles"> Seychelles </option>
                    <option value="Sierra Leone"> Sierra Leone </option>
                    <option value="Singapore"> Singapore </option>
                    <option value="Slovakia"> Slovakia </option>
                    <option value="Slovenia"> Slovenia </option>
                    <option value="Solomon Islands"> Solomon Islands </option>
                    <option value="Somalia"> Somalia </option>
                    <option value="Somaliland"> Somaliland </option>
                    <option value="South Africa"> South Africa </option>
                    <option value="South Ossetia"> South Ossetia </option>
                    <option value="Spain"> Spain </option>
                    <option value="Sri Lanka"> Sri Lanka </option>
                    <option value="Sudan"> Sudan </option>
                    <option value="Suriname"> Suriname </option>
                    <option value="Svalbard"> Svalbard </option>
                    <option value="Swaziland"> Swaziland </option>
                    <option value="Sweden"> Sweden </option>
                    <option value="Switzerland"> Switzerland </option>
                    <option value="Syria"> Syria </option>
                    <option value="Taiwan"> Taiwan </option>
                    <option value="Tajikistan"> Tajikistan </option>
                    <option value="Tanzania"> Tanzania </option>
                    <option value="Thailand"> Thailand </option>
                    <option value="Timor-Leste"> Timor-Leste </option>
                    <option value="Togo"> Togo </option>
                    <option value="Tokelau"> Tokelau </option>
                    <option value="Tonga"> Tonga </option>
                    <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                    <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                    <option value="Tristan da Cunha"> Tristan da Cunha </option>
                    <option value="Tunisia"> Tunisia </option>
                    <option value="Turkey"> Turkey </option>
                    <option value="Turkmenistan"> Turkmenistan </option>
                    <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                    <option value="Tuvalu"> Tuvalu </option>
                    <option value="Uganda"> Uganda </option>
                    <option value="Ukraine"> Ukraine </option>
                    <option value="United Arab Emirates"> United Arab Emirates </option>
                    <option value="United Kingdom"> United Kingdom </option>
                    <option value="Uruguay"> Uruguay </option>
                    <option value="Uzbekistan"> Uzbekistan </option>
                    <option value="Vanuatu"> Vanuatu </option>
                    <option value="Vatican City"> Vatican City </option>
                    <option value="Venezuela"> Venezuela </option>
                    <option value="Vietnam"> Vietnam </option>
                    <option value="British Virgin Islands"> British Virgin Islands </option>
                    <option value="US Virgin Islands"> US Virgin Islands </option>
                    <option value="Wallis and Futuna"> Wallis and Futuna </option>
                    <option value="Western Sahara"> Western Sahara </option>
                    <option value="Yemen"> Yemen </option>
                    <option value="Zambia"> Zambia </option>
                    <option value="Zimbabwe"> Zimbabwe </option>
                    <option value="other"> Other </option>
                  </select>
                  <label class="form-sub-label" for="input_6_country" id="sublabel_country"> Country </label></span>
              </td>
            </tr>
          </table>
          <div id="cid_7" class="form-input-wide"> <span>
              <input class="form-checkbox" type="checkbox" id="input_3_2" name="agree_term" value="1" />
            </span>I agree to the terms and condition          </div>
          <div id="cid_" class="form-input-wide">
<button id="input_" type="submit" name="smOrder" class="form-submit-button"> Submit </button>
          </div>
        </div>
      </li>
      <li class="form-line1" id="id_2"></li>
      <li class="form-line1" id="id_"></li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="23558241760151" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "23558241760151-23558241760151";
  </script>
</form></div>
      </div>
      <div class="div-inside-bottom-plain">
        <p>&nbsp;</p>
        <p><br />
          <br />
        </p>
        <p><br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        </p>
      </div>
    </div>
    <div class="div-footer"><div class="bg-footer"></div>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="tropical_citrus_flavour.html">Tropical Citrus</a></li>
        <li><a href="lemonade_flavour.html">Lemonade</a></li>
        <li><a href="dragonfruit_flavour.html">Dragonfruit</a></li>
        <li><a href="company.html">Company </a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="faqs.html">FAQ's</a>
        </li>
        <li><a href="online_order.html">Online Order</a></li>
        <li><a href="dealer_locator.html">Dealer Locator</a></li>
             <span class="txt-small color-grey clear">©  Copyright 2012 drinkwildwater.com </span>
 </ul>
    </div>
    <script>
    $("#country").val("<?php echo isset($_POST["country"]) ? $_POST["country"] : ""; ?>");
    </script>
</body>
</html>
