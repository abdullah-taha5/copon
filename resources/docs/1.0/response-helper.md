# Response Helper

---

```php
public function responseHelper($code, $status, $message = "", $data = [], $class = '')
{
    // Check Response Status If Equals False Describe Error In Logs File
    !$status ?? Log::critical($message . ' In Class ' . $class);
    // Return Formatted Array
    return [
        'code'      => $code, // Http Status Code
        'success'   => $status, // Response Status Success [bool (True, False)]
        'message'   => $message, // Message to the end customer 
        'data'      => $data     // Send nay needed data
    ];
}

``` 