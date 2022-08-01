1. How can we submit a form without a submit button?
   We can press the Enter key to submit a form without a button. We can attach an event listener for the Enter key to trigger the form's `submit()` function in javascript.

2. What are the different functions in sorting an array?
   It can be sorted in ascending `sort()` or descending `rsort()` order, we can sort the array according to the value in ascending `asort()` or descending `ksort()` order. If the array has key, we can use the key to srot it in ascending `arsort()` or descending `krsort()` order.

3. How can we encrypt the username and password using PHP?
   We can encrypt them with a function called `password_hash()`, php.net/manual/en/function.password-hash.php, it is better than manually using functions like `sha1()` or `md5()` because those hashes are insecure to be used to store a password. `password_hash()` algorigthm also changes over time to ensure that the algorithm used is always secure.

4. How can we get the browser properties using PHP?
   To get the user agent for the browser, we can use `$_SERVER['HTTP_USER_AGENT']`, for miscellaneous properties, we can use the `get_browser()` function.

5. How can we know the number of days between two given dates using PHP?
   We can use `date_diff($date1, $date2)` to calculate the difference between two dates.

6. How can we take a backup of a MySQL table and how can we restore it. ?
   We can take backup of MySQL table by using the command `mysqldump --tables table_name`. To restore the dump, we can run `mysql -u username < mysql_dump.sql` while running the command in the same folder as the sql file.

7. How can we optimize or increase the speed of a MySQL select query?

   - We should use column names instead of \* in `select` statement.
   - We should avoid nest views from `select` query, it would retrieve more data than it is needed.
   - We should avoic using `or` in join condition

8. How many ways can we get the value of current session id?
   We can use `session_id()` to get or set the current session id.

9. How can we store session into database?

   - We can create `session` table in database and store the session with hashed into the table

10. What are DDoS, XSS, SQL injection attack. How can we prevent the attacks?

    - DDoS is short for Distributed Denial of Service attack, it happen when a lot of device send a connection to the same (victim) device at a short time, causing the victim to not have enough resources to handle legitimate connection or service a normal user. It can be prevented by hosting our services across load balancers, which balance the connections across multiple different servers so our service won't overload with connections

    - XSS is is short for Cross Site Scripting attack, it happen when script is injected into a website that is usually trusted, so it can be run without the knowledge of the site owner or the victim itself. Since it usually is caused by unsanitized input, the best way to prevent it is to sanitize all input of the website so no malicious code can be injected into the website.

    - SQL injection attack allows the attacker to interact with the database in a way that should usually be restricted. So for example in a store page the user should only be able to add product to cart, buy product, view product. But SQL injection can allow them to maybe change the price, or even buy "out of stock" products, or can even get admin account privileges. As is XSS, the best way to prevent SQL injection is to sanitize the input of the website, since most of the time, SQL injection is possible because the input is not sanitized, so the attacker can put in raw commands in the input and it gets accepted by the website.

11. What do we take note when uploading a file larger than 500MB?
    The upload may fail based on the `post_max_size`, `upload_max_filesize`, and `max_execution_time` values in php.ini. To circumvent this issue, we can use a concept called Chunked Uploading.

12. How can we secure PHP application and database? Please state that in various aspects.
    Other than the steps listen above in 10. to prevent the three types of attacks on the application from those aspects, there are other ways to secure it:

    - We should update PHP as often as we can since updates can patch or fix security vulnerability that people may have found in older versions
    - We should enforce HTTPS connection to the application so the user can connect to the application securely without worrying that other people can see the info that they send to us
    - We should only allow `localhost` connection to the database, so people cannot connect to our database directly from the internet (they can only interact with the database through our application)

13. To create a function to extract all images from an article, and download.

    require_once('/function/simple_html_dom.php');
    $html = file_get_html('https://www.wikipedia.org/');
      foreach($html->find('img') as $element) {
    echo $element->src, "n";
    }
