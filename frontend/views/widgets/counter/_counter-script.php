<?php
//Includes the scripts required to work our counter.
//Pass In:
//  displayClass - The class name of our display container.
//      EG: <div class='display'></div> => displayClass == 'display'
//  currentCount - Where to start our counter.
//  currentCountIncrement - How much to increment our counter by.
//  secondsBetweenUpdate - How long to wait before updating.
//  currentClickIncrement - Amount to increment by every time we click.
use yii\web\View;
?>

<?php $this->registerJsFile(Yii::getAlias("@web") . "/js/incremental-counter.js", ['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php $script = "
    (function($) {
        $(document).ready(function () {
            //Initialize Count
            $('.counter').incrementalcounter();          
            var incrementalcounter = $('.counter').data('incrementalcounter');
            //Set Properties
            incrementalcounter.setCount($currentCount);
            incrementalcounter.setIncrement($currentCountIncrement);
            incrementalcounter.setSecondsBetweenUpdate($secondsBetweenUpdate);
            incrementalcounter.setClassOfCountDisplay('$displayClass');
            incrementalcounter.setIncrementPerClick($currentClickIncrement);
        });
    })(jQuery);" ;
$this->registerJs($script, View::POS_READY);

?>
<span class='counter'></span>
