<?php

class QApplicationTests extends QUnitTestCaseBase {  
    public function testQApplicationAlert(){
        QApplication::DisplayAlert("working");
        
        $arrLength = count(QApplication::$AlertMessageArray);
        
        assertEqual(QApplication::$AlertMessageArray[$arrLength], "working", "Alert added to array of alerts");
    }
}

?>