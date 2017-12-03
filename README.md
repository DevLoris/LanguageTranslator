# LanguageTranslator
Developped by Loris Pinna for PokExp 

## How to use ?
- First, `include("Lang.php");`
- Initialise the class, by, for exemple `$Lang = new Lang("fr")`;
- Load translation file using `$Lang->translationFile('index');` (do not use extansion)
- Call text using `$Lang->translate("text_key");`

## Add translation
### New file :
- Create new file into `lang/(your language)/filename.php`
- Add string into to add translation (example : `$hello = 'Hello world';`) 
- Save and reload page

### Existant file :
- Open your file located at `lang/(your language)/filename.php`
- Add string into to add translation (example : `$hello = 'Hello world';`) 
- Save and reload page

## Special Text
- Create a translation which contain `{key}` (example : `$hello = 'Hello {nickname}';`)
- Call `translateText` (example : `$Lang->translate('hello', array("nickname"=> 'Loris'))`)
- Reload your page, you will see `Hello Loris`
 
You can do with more arguments

## Translation folder
* lang
  * fr
    * `account.php`
    * `shop.php`
  * en
    * `account.php`
    * `shop.php`
    
