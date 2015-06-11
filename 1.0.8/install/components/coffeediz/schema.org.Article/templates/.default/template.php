<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<?if(!empty($arResult['ERRORS'])):?>
	<?foreach($arResult['ERRORS'] as $arErrors){?>
		<p><?=$arErrors?></p>
	<?}?>
<?else:?>

	<div itemscope itemtype="http://schema.org/<?if(!empty($arParams['TYPE'])):?><?=$arParams['TYPE']?><?else:?>Article<?endif?>" <?if($arParams['SHOW'] == "Y"):?>style="display: none;" <?endif?>>

        <?if(!empty($arParams['NAME'])):?>
            <p itemprop="name"><?=$arParams['NAME']?></p>
            <meta itemprop="headline" content="<?=$arParams['NAME']?>"/>
        <?endif?>
        <?if(!empty($arParams['ARTICLEBODY'])):?>
            <p itemprop="articleBody"><?=$arParams['ARTICLEBODY']?></p>
            <meta itemprop="description" content="<?=$arParams['ARTICLEBODY']?>"/>
        <?endif?>
        <?if(!empty($arParams['GENRE'])):?>
            <p itemprop="genre"><?=$arParams['GENRE']?></p>
        <?endif?>

        <?if(!empty($arParams['AUTHOR_TEXT']) and $arParams['AUTHOR_TYPE'] == "Text"):?>
            <p itemprop="author"><?=$arParams['AUTHOR_TEXT']?></p>
        <?elseif(!empty($arParams['AUTHOR_PERSON_NAME']) and $arParams['AUTHOR_TYPE'] == "Person"):?>
            <?$APPLICATION->IncludeComponent(
                "coffeediz:schema.org.Person",
                ".default",
                array(
                    "NAME" => $arParams['AUTHOR_PERSON_NAME'],
                    "ADDITIONALNAME" => $arParams['AUTHOR_PERSON_ADDITIONALNAME'],
                    "FAMILYNAME" => $arParams['AUTHOR_PERSON_FAMILYNAME'],
                    "JOBTITLE" => $arParams['AUTHOR_PERSON_JOBTITLE'],
                    "IMAGEURL" => $arParams['AUTHOR_PERSON_IMAGEURL'],
                    "WORKSFORNAME" => $arParams[''],
                    "PERSON_URL_SAMEAS" => $arParams['AUTHOR_PERSON_URL_SAMEAS'],
                    "PERSON_URL" => $arParams['AUTHOR_PERSON_URL'],
                    "PERSON_PHONE" => $arParams['AUTHOR_PERSON_PHONE'],
                    "PERSON_EMAIL" => $arParams['AUTHOR_PERSON_EMAIL'],
                    "ITEMPROP" => "author",
                ),
                false
            );?>
        <?elseif(!empty($arParams['AUTHOR_ORGANIZATION_NAME']) and $arParams['AUTHOR_TYPE'] == "Organization"):?>
            <?$APPLICATION->IncludeComponent(
                "coffeediz:schema.org.OrganizationAndPlace",
                "",
                Array(
                    "TYPE" => "Organization",
                    "TYPE_2" => $arParams['AUTHOR_ORGANIZATION_TYPE_2'],
                    "TYPE_3" => $arParams['AUTHOR_ORGANIZATION_TYPE_3'],
                    "TYPE_4" => $arParams['AUTHOR_ORGANIZATION_TYPE_4'],
                    "NAME" => $arParams['AUTHOR_ORGANIZATION_NAME'],
                    "DESCRIPTION" => $arParams['AUTHOR_ORGANIZATION_DESCRIPTION'],
                    "POST_CODE" => $arParams['AUTHOR_ORGANIZATION_POST_CODE'],
                    "COUNTRY" => $arParams['AUTHOR_ORGANIZATION_COUNTRY'],
                    "REGION" => $arParams['AUTHOR_ORGANIZATION_REGION'],
                    "LOCALITY" => $arParams['AUTHOR_ORGANIZATION_LOCALITY'],
                    "ADDRESS" => $arParams['AUTHOR_ORGANIZATION_ADDRESS'],
                    "PHONE" => $arParams['AUTHOR_ORGANIZATION_PHONE'],
                    "FAX" => $arParams[''],
                    "SITE" => $arParams['AUTHOR_ORGANIZATION_SITE'],
                    "LOGO" => $arParams[''],
                    "ITEMPROP" => "author",
                ),
                false,
                array('HIDE_ICONS' => 'Y')
            );?>
        <?endif?>



        <?if(!empty($arParams['RATINGVALUE']) and $arParams['PARAM_RATING_SHOW'] == "Y"):?>
            <?$APPLICATION->IncludeComponent(
                "coffeediz:schema.org.AggregateRating",
                ".default",
                Array(
                    "SHOW" => $arParams['RATING_SHOW'],
                    "RATINGVALUE" => $arParams['RATINGVALUE'],
                    "RAITINGCOUNT" => $arParams['RAITINGCOUNT'],
                    "REVIEWCOUNT" => $arParams['REVIEWCOUNT'],
                    "BESTRATING" => $arParams['BESTRATING'],
                    "WORSTRATING" => $arParams['WORSTRATING'],
                    "ITEMPROP" => "Y"
                ),
                false,
                array('HIDE_ICONS' => 'Y')
            );?>
        <?endif?>

	</div>

<?endif?>

