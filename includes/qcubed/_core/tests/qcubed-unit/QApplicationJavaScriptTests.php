<?php
class QApplicationJavaScriptTests extends QUnitTestCaseBase {
    /* Test to make sure QApplication::DisplayAlert is working */
    public function testQApplicationAlert(){
        // Find the last message in the array
        $lastMessage = count(QApplication::$AlertMessageArray) - 1;
        
       // Make sure DisplayAlert has an array to push to
       $this->assertIsA(QApplication::$AlertMessageArray, "Array", "AlertMessageArray is an array");
       
       // Set an alert
        QApplication::DisplayAlert("alert 1");
       
        $this->assertEqual(QApplication::$AlertMessageArray[$lastMessage], "alert 1", "Alert added to array of alerts");
        $this->assertEqual($lastMessage, 0, "There should be only one message in the array of alerts");
       
        // Do it again
        QApplication::DisplayAlert("alert 2");
        $this->assertEqual($lastMessage, 1, "There should be two messages in the array of alerts");
        $this->assertEqual(QApplication::$AlertMessageArray[$lastMessage], "alert 2", "Alert added to array of alerts");
    }
    
    public function testQApplicationExecuteJavaScript(){
        
        $lastMessage = count(QApplication::$JavaScriptArray);
        
        // Make sure ExecuteJavaScript has arrays to push to
        $this->assertIsA(QApplication::$JavaScriptArray, "Array", "JavaScriptArray is an array");
        $this->assertIsA(QApplication::$JavaScriptArrayHighPriority, "Array", "JavaScriptArrayHighPriority is an array");
        $this->assertIsA(QApplication::$JavaScriptArrayLowPriority, "Array", "JavaScriptArrayLowPriority is an array");
        
        // Make sure nothing is in them
        $this->assertEqual(count(QApplication::$JavaScriptArray), 0, "JavaScriptArray is empty");
        $this->assertEqual(count(QApplication::$JavaScriptArrayHighPriority), 0, "JavaScriptArrayHighPriority is empty");
        $this->assertEqual(count(QApplication::$JavaScriptArrayLowPriority), 0, "JavaScriptArrayLowPriority is empty");
        
        QApplication::ExecuteJavaScript("alert('Execute JavaScript')");
        // Make sure something was added only to the JavaScriptArray
        $this->assertEqual(count(QApplication::$JavaScriptArray), 1, "JavaScriptArray has one member");
        $this->assertEqual(count(QApplication::$JavaScriptArrayHighPriority), 0, "JavaScriptArrayHighPriority is empty");
        $this->assertEqual(count(QApplication::$JavaScriptArrayLowPriority), 0, "JavaScriptArrayLowPriority is empty");
        
        // Add something to the high priority array
        QApplication::ExecuteJavaScript("alert('Execute Anothe rJavaScript')", 1);
         // Make sure something was added to JavaScriptArrayHighPriority
        $this->assertEqual(count(QApplication::$JavaScriptArray), 1, "JavaScriptArray has one member");
        $this->assertEqual(count(QApplication::$JavaScriptArrayHighPriority), 1, "JavaScriptArrayHighPriority has one member");
        $this->assertEqual(count(QApplication::$JavaScriptArrayLowPriority), 0, "JavaScriptArrayLowPriority is empty");
        
        // Add something to the low priority array
        QApplication::ExecuteJavaScript("alert('Execute Anothe rJavaScript')", 1);
         // Make sure something was added to JavaScriptArrayLowPriority
        $this->assertEqual(count(QApplication::$JavaScriptArray), 1, "JavaScriptArray has one member");
        $this->assertEqual(count(QApplication::$JavaScriptArrayHighPriority), 1, "JavaScriptArrayHighPriority has one member");
        $this->assertEqual(count(QApplication::$JavaScriptArrayLowPriority), 0, "JavaScriptArrayLowPriority has one member");
        
    }
    
}

?>