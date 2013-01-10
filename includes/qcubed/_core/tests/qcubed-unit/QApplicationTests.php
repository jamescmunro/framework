<?php

class QApplicationTests extends QUnitTestCaseBase {
    /* Test to make sure QApplication::DisplayAlert is working */
    public function testQApplicationAlert(){
        QApplication::DisplayAlert("working");
        $lastMessage = count(QApplication::$AlertMessageArray) - 1;
        $this->assertEqual(QApplication::$AlertMessageArray[$lastMessage], "working", "Alert added to array of alerts");
    }
}

?>