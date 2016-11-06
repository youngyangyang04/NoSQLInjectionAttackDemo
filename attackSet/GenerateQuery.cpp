#include <iostream>
#include <stdio.h>
#include <time.h>
#include <stdlib.h>
using namespace std;
int main(){
    freopen("E:\codeblocks\AttackQueryJAVA4.txt","w",stdout);
    srand((unsigned)time(NULL));
    for(int i=0;i<1000;i++){
        string url = "username：1234   password：1234','";
        int count1 = rand()%20;
        string parameters1;

        for(int j=0;j<count1;j++){
            int t = rand()%2;
            if(t==0){
                int temp = rand()%10;
                parameters1+=temp+'0';
            }
            else{
                int temp = rand()%26;
                parameters1+=temp+'a';
            }
        }
        url+=parameters1;
        url+="':'";
        url+=parameters1;
 /*       string parameters2;
        for(int j=0;j<count1;j++){
            int t = rand()%2;
            if(t==0){
                int temp = rand()%10;
                parameters2+=temp+'0';
            }
            else{
                int temp = rand()%26;
                parameters2+=temp+'a';
            }
        }
        url+=parameters2;
        url+=";return%20true;}//";*/
        cout<< url<<endl;
    }
}
