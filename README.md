# LanguageTranslator
Developped by Devloris for PokExp Community
Few implementations coming soon

##How to call ?
First, include("class/Lang.php");
Next, initialise the class, by, for exemple $Lang = new Lang("LANG");

//COMING SOON
Call a file, by include($Lang->translationFile("FILE NAME WITHOUT EXTENSION"));
Next, to made a text translatable, do $Lang->translateText("TEXT OF TRANSLATION FILE");

##Add translation
In your translation file, just add a new String variable

##Special Text
You can add special variable on your file, you need to add {i}, and when you call a translateText, just do $Lang->translateText("TEXT OF TRANSLATION FILE", "ARGUMENT 1");
You can do that with {i2} also, by adding an "ARGUMENT 2" to the precendent exemple. 
