<!--1.1-->
<script type="text/javascript">
  var link = "https://google.com:3000/pathname/?arg=test#hash";
  var parsed_link = new URL(link);
  console.log(parsed_link);
</script>
<!--1.2-->
<!-- Не получилось:( -->
<!--1.3-->
<!--именно менять существующую если и можно, то о таком способе я не знаю. Можно создать в css новый класс с другим content: ''; вручную, можно создать  -->
<!--новую как в скрипте в самом теле документа -->
<script type="text/javascript">
document.styleSheets[0].addRule('p:before', 'content: "Новый контент";');
</script>

<?php
//2.1
//Нужно туды добавить вот эту строку
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
//2.2
function getRandomDate($from, $to) {
  $from   = strtotime($from);
  $to     = strtotime($to);
  $result = rand($from, $to);
  return date('Y-m-d', $result);
}
 echo getRandomDate('1994-4-11', '2021-4-11');
 //2.3
 // Не знаю о такой возможности. Поискал в интернете, ничего толкового не нашел. Было бы интересно почитать про такую возможность
// sadfasdfasdf

 //3.1
// Правка файла init.php
\Bitrix\Main\EventManager::getInstance()->addEventHandler('sale', 'OnSaleStatusOrderChange', ['Handler', 'OnSaleStatusOrderChange']);

class Handler {
  function OnSaleStatusOrderChange($event)
  {
    $param = $event->getParameters();
    if ($param['VALUE'] === 'N') {
      /** @var \Bitrix\Sale\Order $order */
      $order = $param['ENTITY'];
      // Произвольный код тут
    }

    return new \Bitrix\Main\EventResult(
      \Bitrix\Main\EventResult::SUCCESS
    );
  }
}


//3.2
namespace Partner;
\Bitrix\Main\EventManager::getInstance()->addEventHandler(
    'sale',
    'OnSaleOrderSaved',
    '\Partner\MyClass::onSaleOrderSaved'
);
class MyClass
{
    function onSaleOrderSaved(\Bitrix\Main\Event $event)
    {
        $order = $event->getParameter("ENTITY");
        $oldValues = $event->getParameter("VALUES");
        if(!$order->getField('PAYED') || !$oldValues['PAYED'] || !(($order->getField('PAYED')=='Y') && ($oldValues['PAYED']=='N')))
            return;
        // Что-то делаем
    }
}

//3.3. на актуальной не проверял, работало там, где это требовалось на доработках
<?
global $USER;
if ($USER->IsAuthorized()) {
  $USER->GetLogin();
}
?>

//4.1
// Расширение/дополнение функционала основной темы

//4.2
$args  = array();
$query = new WP_Query( $args );
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) { $query->the_post();
  }
}
wp_reset_postdata();
//4.3
// Не сделаю такого сейчас:(


//5
