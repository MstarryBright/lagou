// 创建ajax对象
function createxhr() {
    try {
        return new XMLHttpRequest();
    } catch (e) {
        return new ActiveXObject('Microsoft.XMLHTTP');
    }
}

/**
 *  method        get/post     请求方式
 *　url                     请求的地址
 *  content    name=zhangsan&age=10    我们要传递的参数
 *  responseType     text/json   text 是普通字符串   json  是json形式的字符串
 *  callback         function      用来实现服务器返回的数据处理
 */
function ajax(method, url, content, responseType, callback) {

    // 1.创建对象
    var xhr = createxhr();

    // 判断请求方式
    if (method == 'get') {
        // 2.初始化
        // demo1.php ? name=zhangsan&age=10
        url = url + '?' + content;
        xhr.open('get', url);
        // 3.发送请求
        xhr.send(null);
    } else {
        // 2.初始化
        xhr.open('post', url);
        // 设置请求头
        xhr.setRequestHeader('Content-Type', 'Application/x-www-form-urlencoded');
        // 3.发送请求
        xhr.send(content);
    }

    // 4.对返回数据的处理
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {

            if (responseType == 'text') {
                alert(xhr.responseText);
            } else if (responseType == 'json') {
                // 将json字符串转化为json对象
                var obj = JSON.parse(xhr.responseText);
                //var obj = eval("("+xhr.responseText+")");
                //alert(obj);
                callback(obj);
            }
        }
    }

}