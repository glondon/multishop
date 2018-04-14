<?
/* $Id: guide-multishop.php,v 1.1.1.1 2005/11/21 13:48:06 tropic Exp $ */

if (!isset($currentlang)) $currentlang = "english";
@include("admin/language/lang-".$currentlang.".php");

?>
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
<html><head><title>Guide Multi-Shop</title>
<style>
	FONT		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
	BODY		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
	P		{FONT-FAMILY: Verdana,Helvetica; FONT-SIZE: 11px}
	A:link          {BACKGROUND: none; COLOR: #363636; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
	A:active        {BACKGROUND: none; COLOR: #363636; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
	A:visited       {BACKGROUND: none; COLOR: #363636; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
	A:hover         {BACKGROUND: none; COLOR: #363636; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: underline}
	.title 		{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 14px; FONT-WEIGHT: bold; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
	.content 	{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-FAMILY: Verdana, Helvetica}
	.tiny		{BACKGROUND: none; COLOR: #000000; FONT-SIZE: 11px; FONT-WEIGHT: normal; FONT-FAMILY: Verdana, Helvetica; TEXT-DECORATION: none}
</style>
</head>
<body bgcolor="#F6F6EB">
<center>
<a href="http://php-multishop.com" target="blank"><img src="../../images/admin/multishop.gif" border="0" alt="Php-MultiShop"></a>
<br>
<font class="title">How to use the Multi-Shop admin module</font><br>
(always under construction)
</center>
<br><br>

<center><font class="title">&nbsp;&nbsp;&nbsp;<? echo STORES; ?></font></center>
<br>
After the installation and the configuration of a store (store-side), when enough quantity of content (as products, categories,...) is available, you can add (link) this store in the portal (portal-side).
Then, click on the link '<b><? echo STORES; ?></b>', and use the form '<b><? echo _ADDVENDOR; ?></b>', in which there are the following field: Prefix, Name, Url-Catalog, Type of Store.
<br>
<br><b>Prefix</b>: is the 'Store-Identifier' you used during the installation of the store. Put exactly the prefix that you inserted during the installation.
<br>It's required a least number of characters, and this number is modifiable in the <b>Configuration</b> function of Multi-Shop module.<br>
The prefix will be not displayed to the users: for each Store, the Name displayed will be the field '<? echo _VENDORS_NAME; ?>'.<br><br>
<b><? echo _VENDORS_NAME; ?></b>: It's the Name of the Store (Shop, Vendor). It's required a minimun number of chars. For this filed, select the name you want, for example Bookshop, Jeweller, Sportswear, ...
<br><br>
<b>Url-Catalog</b>: it's the Url (web address) of the Store, with the 'index.php' file and without the chars 'http://'
<br>Examples:<br>
&nbsp;&nbsp;&nbsp;www.shopping.books.org/catalog/index.php<br>
&nbsp;&nbsp;&nbsp;www.myshop.com/index.php<br>
&nbsp;&nbsp;&nbsp;musiconline.com/shop/index.php

<br><br>
<b><? echo _SET_TYPE; ?></b>: there are the following option:
<br>
ACTIVE: it's a store finished, with content, products, ...ready for e-commerce with all the features.
This store must be installed in the same DataBase of the portal.
<br>
INACTIVE: it's a store still in development, deactivated, in testing, etc..
This type of store will be not seen from the users.
<br>
EXTERNAL: store installed in other DataBase or server, not the same of the portal.
This type of store hasn't all the features available in the ACTIVE store: for example, the user of this store will be not shared with the user of the portal, thereafter are required different login.

<br><br>
<b>IMPORTANT</b><br>
After adding a new store in the portal filling out the four fields above, you should set some preferences and add further information on the <? echo STORES; ?> by clicking on the 'Edit' link.

<br><br>
<b><? echo _ENABLE_TO_SHOW; ?></b> Products, Reviews, Specials, Best Products.
<br>Select the checkbox you want: for example, if your store has enough content (enough products, then, in other words, it's ready for e-commerce),
you can select 'Products'.
<br>In this way the products of this store will be displayed in the portal.
The same thing for Specials, Reviews, Products most purchased...
<br>
Another example: if your store still haven't products (or Specials, ...) don't select the checkbox Products (or Specials, ...).

<br><br>
<b><? echo _ASSIGN_CATEGORY; ?></b>:
it's an important option that you should use.
<br>You can create the categories you want in the portal (see below, the Categories section); also in each store you can create categories;
then, the categories of the portal aren't the same categories of each store.
<br>
For this reason there is the option <? echo _ASSIGN_CATEGORY; ?>: in order to link a category of the portal to one or many stores;
<br>
besides, if, using the option <? echo _ASSIGN_CATEGORY; ?>, you use the field 'cPath', the category will be linked directly to a specified category/subcategory of the store.
<br>Example:<br>
you have installed a store (for example called 'bookshop') and in the portal have created the category 'books';
then, you must assign the category 'books' to the store 'bookshop':
edit the store 'bookshop' and in the option '<? echo _ASSIGN_CATEGORY; ?>' select the category 'books'.
<br>
In this way, when a user in the portal select the category books, will see the store 'bookshop', and by clicking a link will be transferred to the home page of this store.
<br>
Besides, if for the store bookshop you assign correctly the field <b>cPath</b>, the user will be transferred not to the home page but directly to the appropriate category of this store.

<br><br>
<b>What'is cPath?</b>: in each store (store-side) any categorys/subcategory is identified by a variable called 'cPath'; for example:
<br>cPath = '3' identifies the category with ID=3;
<br>cPath = '3_5' is the subcategory '5' discendant from the category '3'.
<br>cPath = '3_5_21' is the subcategory '21' discendant from the subcategory '5'...

<br><br><b><? echo _PATH_LOGO; ?>, <? echo _PATH_IMAGE_SHOP; ?></b>: the filename of image and logo, that must be uploaded in the "your_portal/images/vendors/" directory.

<br><br><b><? echo DESCRIPTION_SHOP; ?></b> and <b><? echo DESCRIPTION_PRODUCTION; ?></b>:
the descritpion in various languages about the Shop, readable through the
<a href="../../modules.php?name=Multishop" target="blank">Multishop</a> module.
The default language will be required.


<br><br><br>
<center><font class="title"><? echo _ALL_CATEGORIES; ?></font></center>

<br><b>How to create a Category in the store-side</b> (each store): 
<br>In each store you must create some categories of products, for example 'books', software, hardware, ...
<br>In the store, each category has the own ID called cPath (see above for further informations about cPath):
when you create a category, the value cPath will be assigned automatically by the platform.
To know the cPath of a category, you simply have to navigate as user into the store, click the category (for example books) and read the cPath within the Url:
<br>for example the Url:
<br>&nbsp;&nbsp;&nbsp;<i>myshop.com/index.php?<b>cPath=1</b>...</i>
<br>
means that the cPath of the selected category (for example books) is = '1'.

<br><br><b>How to create a Category in the portal-side</b> (your mall portal): 
<br>After login as administrator, go to the Multi-Shop admin module and click on the <u><? echo _ALL_CATEGORIES; ?></u> link, then on <u>Add Category</u>.
<br>Here there is a form to create a category in many languages, and a drop-down menu called '<? echo _MOTHER_CATEGORY; ?>'.
<br>'<b><? echo _MOTHER_CATEGORY; ?></b>' must be used to create a sub-category, in other words if the category you want to create is a 'child' of an existing category, for example:
<br>if exists a category 'books' and you are creating the subcategory 'comics' or 'thrillers', you shoul select 'books' as <? echo _MOTHER_CATEGORY; ?>.

<br><br><b>How to link a portal-category with a store-category</b>.
<br>In order to link a category of the portal to one (or many) store,
click on the <u><? echo STORES; ?></u> link of Multi-Shop module, then on <u>Edit</u> link of the desired store.
<br>Then, use the option '<? echo _ASSIGN_CATEGORY; ?>' explained above in the '<? echo STORES; ?>' section.


<br><br><b><? echo _GENERATE_LIST; ?></b><br>
Using this option you can generate a 'static' list of categories, improving the performance of your mall:
in fact, if exists a static list (tree) of categories/subcategories,
is not required e multi-query to generate the list of category dynamically, every time you load the page of the portal.
A dynamic generation of the category list is not a hard load when you have a lot of categories.
But if you have several categories and, above all, many levels of subcategories,
the number of query to the DB can increase exponentially.
For this reason, any time you change the list of categories (when you create/edit/delete a category)
you must generate the static list (or better, update the existing list),
by clicking the button <input type="submit" value="<? echo _GENERATE_LIST; ?>">
<br>After click, simply select the languages you are using adding the categories.

<br><br><br>
<center><font class="title"><? echo _CONFIG; ?></font></center>

<br>Here you can configure your e-commerce mall.

<br><br><b>Add/Edit Stores and Categories</b>
<br>Is not required an explanation: simply you can set the minimum number of character required for Prefix and Name of Store (default: 3).

<br><br><b>Mode to display the categories...</b>
<br>In the block 'Categories of Products', you can display the list of categories as tree or with a drop and down manu.
I you aren't sure, select 'random'.

<br><br><b>Mode to display the Shops...</b>
<br>In the block 'Select a Store', you can display the list of store as tree or with a drop and down manu.
I you aren't sure, select 'random'.

<br><br><b>Random Products displayed in Home Page...</b>
<br>When an user visit the Home Page or the Categories_Products module,
some random products will be displayed: here, you can set some values for this visualization.


<br><br><b>Products displayed by a selected category...</b>
<br>This feature in the Categories_Products module is still in development/improvement;
<br>however, when an user select a category (by clicking in the block or the module Categories_Products),
a list of products for the selected category will be displayed.
<br>Here you can set the number of products for each store (used in the query to the DB),
and the max number of products displayed for page.

<br><br><b>Home Page (News) and RSS</b>
<br>The first three values are intuitive, but the fourth (about RSS) not much.
<br>If you <? echo _SHOW_RSS; ?>, in the header of each page will be included some TAG to segnalling
the presence of RSS/XML feeds (it works on Firefox).
You can see the file <a href="../../rss.php"><u><b>rss.php</b></u></a>
to get XML/RSS information about Products, Special Offers, Reviews and Products most purchased of you mall.
<br>the users can use this information, for example by using a feed reader (RSS reader).
<br>Also, you can use the file 'rss.php' to provide your information to external websites.
The Url to get the information are:
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rss.php?op=prod_random &nbsp;&nbsp;&nbsp;(a Product random)
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rss.php?op=specials &nbsp;&nbsp;&nbsp;(a Product in Special Offer)
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rss.php?op=reviews &nbsp;&nbsp;&nbsp;(the Review of a product)
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rss.php?op=best &nbsp;&nbsp;&nbsp;(Products most purchased)
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;rss.php &nbsp;&nbsp;&nbsp;(Overwiew of the Mall, the default option)

<br><br><b>Images Widht of every shop</b>
<br>Here you can set the widht of the images (Logo , Store Image, Production Image),
that you must upload in the 'your_portal/images/vendors/' folder.

<br><br><b>Tax rate</b>
<br>- <? echo _INCLUDE_TAX_RATE; ?>: if selected, the price of products will include the tax calculation.
<br>- <? echo _SHOW_TAX_RATE; ?>: the applied tax rate will be displayed.
<br>Note: the Tax Setting is a functionnality of the store-side (each <? echo STORES; ?>), not of portal-side,
thereafter each store can have different values of Tax.

<br><br><br>
<center><font class="title"><? echo _CURRENCIES; ?></font></center>
<br>Here you can add, remove or set as default a <? echo _CURRENCY; ?>.
<br>Every Store will have these <? echo _CURRENCIES; ?>, and the store administrators cannot manage them.
<br><b>IMPORTANT</b>: If you use many <? echo _CURRENCIES; ?>, you must update the data manually. 

<br><br>
</body></html>

































































