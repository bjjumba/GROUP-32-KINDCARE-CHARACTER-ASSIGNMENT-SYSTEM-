#include<stdio.h>
#include<stdlib.h>
#include<windows.h>
#include<conio.h>
#include<string.h>
#include<mysql.h>
#include<time.h>
//SQL ERROR FUNCTION
void finish_with_error(MYSQL*conn){
fprintf(stderr,"%s\n",mysql_error(conn));
mysql_close(conn);
exit(1);
}

int main(){
//SYSTEM COLOUR
char active[20]="Active";
//CURRENT TIME
char array[100]={"6"};
float attempted;
float total_assignment;
float percent_attempt;
float percent_missed;
  time_t currentTime;
  time(&currentTime);
  time_t p=ctime(&currentTime);
  printf("\r \n%s\n",p);
//other variables
char dummy[25];
double total;
    float entry=0;
    int result;
    float average;
    double score=0;
    float sum=0;
    int Choice;
    int count=1;
    int n,i,j;
//DECLARATION OF MYSQL VARIABLES
MYSQL_RES *resultset;
MYSQL_RES *res;
MYSQL_ROW row;
MYSQL_RES*name;
MYSQL_RES*ray;
char Fname[30], sqlquery[10];
char pass[10];
MYSQL * conn;
//database connection
  printf(" \n============================================================================================\n ");
  printf("\t\t\t\tKINDERCARE CHARACTER SYSTEM\n");
  printf(" \n============================================================================================\n ");
  printf("Enter usercode:");
  scanf("%s",dummy);
   conn = mysql_init(NULL);
   conn = mysql_real_connect(conn,"localhost","root","","kindercare_sys",0,NULL,0);
   if(conn){
     printf("\t\t\t\tSuccessfully connected to KINDERCARE CHARACTER SYSTEM\n\n");
   }
   else {
     printf("not connected\n");
   }
   char ATTEMPT[255]="ATTEMPTED";
   //USER LOGIN SESSION
   char query7[255]="SELECT * FROM pupil WHERE Usercode=\'";
   strcat(query7,dummy);
   strcat(query7,"\'");
   if(mysql_query(conn,query7)){
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if((row=mysql_fetch_row(res))>0){
       //OBTAIN CURRENT TIME
   struct tm*myTime=localtime(&currentTime);
   char startDate[255]="";
   char year[20];
   itoa(myTime->tm_year+1900,year,10);
   char month[20];
   itoa(myTime->tm_mon+1,month,10);
   char day[20];
   itoa(myTime->tm_mday,day,10);
   strcat(startDate,year);
   strcat(startDate,"-");
   strcat(startDate,month);
   strcat(startDate,"-");
   strcat(startDate,day);
   //LETTER STRUCT
    struct character{
    char letter;
    int position[7][5];
};

struct character guide[26]={
 {'A', {{0,0,1,0,0},{0,1,0,1,0},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}}	},

	{'B',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0}} },

	{'C', {{0,0,1,1,1},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{0,1,0,0,0},{0,0,1,1,1}} },

	{'D',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0}} },

	{'E',{{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}} },

	{'F', {{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0}} },

	{'G', {{0,0,1,1,1},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,1,1,1},{1,0,0,0,1},{0,1,1,1,0}} },

	{'H', {{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}} },

	{'I',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{1,1,1,1,1}} },

    {'J',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{1,0,1,0,0},{0,1,1,0,0}} },

    {'K',{{1,0,0,0,1},{1,0,0,1,0},{1,0,1,0,0},{1,1,0,0,0},{1,0,1,0,0},{1,0,0,1,0},{1,0,0,0,1}} },

    {'L',{{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}} },

    {'M',{{1,0,0,0,1},{1,1,0,1,1},{1,0,1,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}} },

    {'N',{{1,0,0,0,1},{1,1,0,0,1},{1,0,0,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,0,0,1,1},{1,0,0,0,1}} },

    {'O',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0}} },

    {'P',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0}} },

    {'Q',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0},{0,0,1,0,0},{0,0,0,1,0},{0,0,0,0,1}} },

    {'R',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0},{1,0,1,0,0},{1,0,0,1,0},{1,0,0,0,1}} },

    {'S',{{0,1,1,1,0},{1,0,0,0,0},{1,0,0,0,0},{0,1,1,1,0},{0,0,0,1,0},{0,0,0,1,0},{1,0,1,0,0}} },

    {'T',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0}} },

    {'U',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0}} },

    {'V',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0}} },

    {'W',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,1,0,1,1},{1,0,0,0,1}} },

    {'X',{{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0},{0,0,1,0,0},{0,1,0,1,0},{1,0,0,0,1},{1,0,0,0,1}} },

    {'Y',{{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0}} },

    {'Z',{{1,1,1,1,1},{0,0,0,1,0},{0,0,1,0,0},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}}}
};
//welcome
printf("Welcome ");
char query8[255]="SELECT lastname FROM pupil WHERE Usercode=\'";
strcat(query8,dummy);
strcat(query8,"\'");
if(mysql_query(conn,query8)){
    finish_with_error(conn);
}
res=mysql_store_result(conn);
if(res==NULL){
    finish_with_error(conn);
}
int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
    for(int i=0;i<num_fields;i++){
    printf("%s",row[i]?row[i]:NULL);

      }
   }
       mysql_free_result(res);
//end welcome
   //LETTER STRUCT
printf("\n\n\t\t\tSTATUS:");
//CHILD STATUS
 char query10[255];
        strcpy(query10," SELECT activeInactive FROM pupil WHERE Usercode=\'");
        strcat(query10,dummy);
        strcat(query10,"\'");
        if(mysql_query(conn,query10)){
            finish_with_error(conn);
        }
        ray=mysql_store_result(conn);
        if(ray==NULL){
            finish_with_error(conn);
        }
        row=mysql_fetch_row(ray);
        char arinda[255];
        strcpy(arinda,row[0]);
        printf("\t%s",row[0],arinda);
//END HERE
printf("\n\n\nINSTRUCTIONS:\n");
printf("\t\t1.ENTER COMMANDS IN CAPITAL LETTERS.\n\t\t\tHINT:ENABLE CAPLOCKS ON KEYBOARD.\n\t\t2.ATTEMPT UPLOADED ASSIGNMENT IN TIME.\n\t\t3.ONLY ACTIVATED STUDENTS CAN ATTEMPT ASSIGNMENT.\n\t\t\tHINT:IF NOT ACTIVATED,SEND A REQUEST TO A RESPECTIVE TEACHER.\n\t\t\tHINT:TEACHER NAMES PROVIDED IN 'VIEWASSIGNMENT'");
   label:
    printf("\n\n\n============================================================================================");
    printf("\n\t\t\t\t\tMENU\n");
    printf("============================================================================================");
    printf("\n\t\t1.VIEWALL\n\t\t2.CHECKSTATUS\n\t\t3.VIEWASSIGNMENT\n\t\t4.CHECKDATES\n\t\t5.REQUESTACTIVATION\n\t\t6.START\n\t\t7.RESULTS\n\t\t8.LOGOUT\n");
    char choice[20];
     char a[20]="VIEWALL";
     char b[20]="CHECKSTATUS";
    char c[20]="VIEWASSIGNMENT";
    char d[20]="CHECKDATES";
    char e[20]="REQUESTACTIVATION";
    char f[10]="START";
    char g[10]="LOGOUT";
    char h[10]="RESULTS";
    printf("\tENTER CHOICE FROM MENU:");
    scanf("%s",choice);
    /*VIEWALL*/
    if(strcmp(a,choice)==0){
            printf("\n__________________________________________________________________\n");
        printf("\n |ASSIGNMENT_ID\t\tEND_DATE\t\tEND_TIME\t\tATTEMPTED\n");
 printf("__________________________________________________________________\n");
 char query12[255]="SELECT assignment.assignmentID,assignment.startDate,assignment.endDate,mark.ATTEMPT FROM mark INNER JOIN assignment ON assignment.assignmentID=mark.assignmentID WHERE Usercode=\'";
   strcat(query12,dummy);
   strcat(query12,"\' AND startDate >=\'");
   strcat(query12,startDate);
   strcat(query12,"\'");
   if(mysql_query(conn,query12)){
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
    for(int i=0;i<num_fields;i++){
    printf(" \t  %s\t",row[i]?row[i]:"NOT ATTEMPTED");

      }

//printf("\n");
printf("\n__________________________________________________________________\n");
    }
   mysql_free_result(res);
        goto label;
    }
    //RESULT
    else if(strcmp(h,choice)==0){
    printf("\n______________________________________________________________________________________\n");
    printf("\tAssignmentID\t\tTeacherComment\t\t\tAverageMark\n");
    printf("______________________________________________________________________________________\n");
      char query9[255]="SELECT assignmentID,comment,average FROM mark WHERE Usercode=\'";
      strcat(query9,dummy);
      strcat(query9,"\'");
      if(mysql_query(conn,query9)){
        finish_with_error(conn);
      }
      res=mysql_store_result(conn);
      if(res==NULL){
        finish_with_error(conn);
      }
      int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
    for(int i=0;i<num_fields;i++){
    printf("\t%s\t\t",row[i]?row[i]:"Pending...");

      }
printf("\n______________________________________________________________________________________\n");
    }
   mysql_free_result(res);
        goto label;

    }
    /*CHECKSTATUS*/
    else if(strcmp(b,choice)==0){
            printf("\tNUMBER OF ASSIGNMENTS:");
            char nick1[20];
        char query4[255]="SELECT COUNT(assignmentID) FROM assignment";
        if(mysql_query(conn,query4)){
            finish_with_error(conn);
        }
        res=mysql_store_result(conn);
            if(res==NULL){
                finish_with_error(conn);
            }
    int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
   for(int i=0;i<num_fields;i++){
     printf("\t%s",row[i]?row[i]:NULL);
     strcpy(nick1,row[i]);
      }

    printf("\t");
    }
     mysql_free_result(res);
     total_assignment=atof(nick1);
     //ATTEMPTED
     char nick[25];
       printf("\tATTEMPTED ASSIGNMENTS:");
        char query5[255]="SELECT COUNT(assignmentID) FROM mark WHERE Usercode=\'";
        strcat(query5,dummy);
        strcat(query5,"\'");
        if(mysql_query(conn,query5)){
            finish_with_error(conn);
        }
        res=mysql_store_result(conn);
            if(res==NULL){
                finish_with_error(conn);
            }
     num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
   for(int i=0;i<num_fields;i++){
     printf("\t%s",row[i]?row[i]:NULL);
      strcpy(nick,row[i]);
      }
    }
     mysql_free_result(res);
     //printf("%s",nick);
     //FUNCTIO TO CONVERT A STRING INTO A FLOAT
    attempted=atof(nick);
    printf("\t");
     //average
       printf("\t\tAVERAGE:");
        char query6[255]="SELECT AVG(average) FROM mark WHERE Usercode=\'";
        strcat(query6,dummy);
        strcat(query6,"\'");
        if(mysql_query(conn,query6)){
            finish_with_error(conn);
        }
        res=mysql_store_result(conn);
            if(res==NULL){
                finish_with_error(conn);
            }
     num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
   for(int i=0;i<num_fields;i++){
     printf("\t%s",row[i]?row[i]:"PENDING");

      }

    //printf("\n");
    }
     mysql_free_result(res);
     //PERCENTAGE ATTEMPT
  percent_attempt=(attempted*100)/total_assignment;
  printf("\n\n\tPercentage Attempted:\t %.2f",percent_attempt);
    //PERCENTAGE MISSED
    percent_missed=100-percent_attempt;
    printf("\t\tPercentage Missed:\t %.2f",percent_missed);
        goto label;
        //END OF CHECKSTATUS
    }
    /*VIEWASSIGNMENT*/
    else if(strcmp(c,choice)==0){
        printf("\n______________________________________________________________________________________");
        printf("\nASSIGNMENT_ID\t\tSTART_DATE\t\tEND_DATE\t\tTEACHER NAME\n");
          printf("______________________________________________________________________________________\n");
          char query15[255]="SELECT assignmentID,startDate,endDate,teacherUsername FROM assignment WHERE startDate >=\'";
          strcat(query15,startDate);
          strcat(query15,"\'");
          if(mysql_query(conn,query15)){
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
   for(int i=0;i<num_fields;i++){
     printf("\t%s\t",row[i]?row[i]:NULL);

      }

  printf("\n______________________________________________________________________________________\n");
    }
     mysql_free_result(res);
     goto label;

        //END OF VIEWASSIGNMENT
    }
    /*check date*/
    else if(strcmp(d,choice)==0){
    //START
    char future_date[255];
       printf("ENTER FUTURE DATE IN FORMAT *YEAR-MONTH-DAY*:");
    scanf("%s",future_date);
    char query11[255]="SELECT assignmentID,startDate,endDate FROM assignment WHERE startDate BETWEEN \'";
    strcat(query11,startDate);
    strcat(query11,"\'");
    strcat(query11," AND \'");
    strcat(query11,future_date);
    strcat(query11,"\'");
    //END
        printf("\n ASSIGNMENT_ID\t\tSTARTDATE\t\t END_DATE \n");
              if(mysql_query(conn,query11)){
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
   for(int i=0;i<num_fields;i++){
     printf(" \t%s\t",row[i]?row[i]:NULL);

      }

printf("\n");
    }
mysql_free_result(res);
        goto label;
        //CHECKDATES
    }
    else if(strcmp(e,choice)==0){
        char teacher[255];
        char atweta[255]="Active";
        if(strcmp(atweta,arinda)==0){
            printf("\t\tYOU ARE ALREADY ACTIVATED");
            goto label;
        }
        char request[200]="REQUESTACTIVATION";
        printf("\n ENTER TEACHER TO SEND ACTIVATION:");
        scanf("%s",teacher);
        //ACTIVATION REQUEST SENDING
        char query3[255];
        strcpy(query3,"INSERT INTO request(request,Usercode,teacherUsername) VALUES(\'");
        strcat(query3,request);
        strcat(query3,"\',\'");
        strcat(query3,dummy);
        strcat(query3,"\',\'");
        strcat(query3,teacher);
        strcat(query3,"\')");
        if(mysql_query(conn,query3)){
            finish_with_error(conn);
        }
        printf("============================ACTIVATION REQUEST SENT!PLEASE WAIT============================");
        goto label;
        //REQUEST ACTIVATION
    }
    //ATTEMPT
    else if(strcmp(f,choice)==0){
        //TEST ACTIVE
        char query2[255];
        char ACTIVE[20];
        strcpy(query2," SELECT activeInactive FROM pupil WHERE Usercode=\'");
        strcat(query2,dummy);
        strcat(query2,"\'");
        if(mysql_query(conn,query2)){
            finish_with_error(conn);
        }
        ray=mysql_store_result(conn);
        if(ray==NULL){
            finish_with_error(conn);
        }
        row=mysql_fetch_row(ray);
        strcpy(ACTIVE,row[0]);
        //printf("\n%s",ACTIVE);
        //STRING COMPARE FOR ACTIVE
        if(strcmp(active,ACTIVE)==0){
        char index[10];
     char assign[255];

     printf("\nENTER ASSIGNMENT ID TO ATTEMPT:");
     scanf("%s",index);
    //CHECK WHETHER ASSIGNMENT IS DONE
    /*
//CHECK ATTEMPT
     char attempted[255]="ATTEMPTED";
     char sammie[255]="HET";
      char assign2[255]="SELECT ATTEMPT FROM mark WHERE Usercode=\'";
    strcat(assign2,dummy);
    strcat(assign2,"\' AND assignmentID=\'");
    strcat(assign2,index);
    strcat(assign2,"\'");
    if(mysql_query(conn,assign2)){
        finish_with_error(conn);
    }
      res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   row=mysql_fetch_row(res);
   strcpy(sammie,row[0]?row[0]:"NOATTEMPTED");
 if(strcmp(sammie,attempted)==0){
      printf("\t\t\t\tALREADY ATTEMPTED");
      goto label;
  }
  mysql_free_result(res);
  mysql_close(conn);
    //CLOSE
   */
     conn = mysql_init(NULL);
   conn = mysql_real_connect(conn,"localhost","root","","kindercare_sys",0,NULL,0);
    strcpy(assign,"SELECT character1,character2,character3,character4,character5,character6,character7,character8 FROM assignment WHERE assignmentID = \'");
    strcat(assign,index);
    strcat(assign,"\'");
     if(mysql_query(conn,assign)){
      finish_with_error(conn);
    }
    row=mysql_fetch_row(res);
     res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
  // printf("\n__________________________________________________________________\n");
   //printf("AID\tC1\tC2\tC3\tC4\tC5\tC6\tC7\tC8\n");
   //printf("__________________________________________________________________\n");
   int num_fields=mysql_num_fields(res);

   row=mysql_fetch_row(res);
   strcpy(array, row[0]);
    for(int i=1;i<num_fields;i++){
     // printf("%s\t",row[i]?row[i]:NULL);
        //try
    strcat(array,row[i]?row[i]:"");
//try
      }

  //printf("\n__________________________________________________________________\n");
mysql_free_result(res);
mysql_close(conn);
printf("\n=============================================================\nLETTERS DRAWN:\n");
    //printf("%s\n",array);
    //START REMOVE
size_t x=0;
size_t b=strlen(array);
for (x=0;x<strlen(array);x++){
    printf("%c\t",array[x]);
}
printf("\n=============================================================\n");
clock_t t=clock();
for (x=0;x<strlen(array);x++){

if(array[x]=='B'){
        entry=0;
        printf("Character to Draw");
          n=1;
            int B[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(int i=0;i<7;i++){
		for(int j=0;j<5;j++){
		printf("Enter 0 or 1 in position B[%d][%d]:",i,j);
		scanf("%d",&B[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(B[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(B[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='A'){
       printf("Character to Draw");
        entry=0;
            n=0;
            int A[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position A[%d][%d]:",i,j);
		scanf("%d",&A[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(A[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(A[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='C'){
    entry=0;
       printf("Character to Draw");
            n=2;
            int C[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position C[%d][%d]:",i,j);
		scanf("%d",&C[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(C[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(C[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//NEW

else if(array[x]=='D'){
    entry=0;
      printf("Character to Draw");
            n=3;
            int D[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position D[%d][%d]:",i,j);
		scanf("%d",&D[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(D[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(D[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='E'){
    entry=0;
       printf("Character to Draw");
            n=4;
            int E[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position E[%d][%d]:",i,j);
		scanf("%d",&E[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(E[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(E[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='F'){
    entry=0;
       printf("Character to Draw");
            n=5;
            int F[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position F[%d][%d]:",i,j);
		scanf("%d",&F[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(F[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(F[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='H'){
    entry=0;
       printf("Character to Draw");
            n=7;
            int H[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position H[%d][%d]:",i,j);
		scanf("%d",&H[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(H[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(H[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='G'){
    entry=0;
       printf("Character to Draw");
            n=6;
            int G[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position G[%d][%d]:",i,j);
		scanf("%d",&G[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(G[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(G[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='I'){
    entry=0;
       printf("Character to Draw");
            n=8;
            int I[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position I[%d][%d]:",i,j);
		scanf("%d",&I[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(I[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(I[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='J'){
    entry=0;
       printf("Character to Draw");
            n=9;
            int J[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position J[%d][%d]:",i,j);
		scanf("%d",&J[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(J[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(J[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='K'){
    entry=0;
       printf("Character to Draw");
            n=10;
            int K[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position K[%d][%d]:",i,j);
		scanf("%d",&K[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(K[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(K[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
else if(array[x]=='M'){
    entry=0;
       printf("Character to Draw");
            n=12;
            int M[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position M[%d][%d]:",i,j);
		scanf("%d",&M[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(M[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(M[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//letter l
else if(array[x]=='L'){
    entry=0;
       printf("Character to Draw");
            n=11;
            int L[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position L[%d][%d]:",i,j);
		scanf("%d",&L[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(L[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(L[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER N
else if(array[x]=='N'){
    entry=0;
       printf("Character to Draw");
            n=13;
            int N[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position N[%d][%d]:",i,j);
		scanf("%d",&N[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(N[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(N[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER O
else if(array[x]=='O'){
    entry=0;
       printf("Character to Draw");
            n=14;
            int O[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position O[%d][%d]:",i,j);
		scanf("%d",&O[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(O[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(O[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER P
else if(array[x]=='P'){
    entry=0;
       printf("Character to Draw");
            n=15;
            int P[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position P[%d][%d]:",i,j);
		scanf("%d",&P[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(P[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(P[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER Q
else if(array[x]=='Q'){
    entry=0;
       printf("Character to Draw");
            n=16;
            int Q[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position Q[%d][%d]:",i,j);
		scanf("%d",&Q[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(Q[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(Q[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER R
else if(array[x]=='R'){
    entry=0;
       printf("Character to Draw");
            n=17;
            int R[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position R[%d][%d]:",i,j);
		scanf("%d",&R[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(R[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(R[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER S
else if(array[x]=='S'){
    entry=0;
       printf("Character to Draw");
            n=18;
            int S[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position S[%d][%d]:",i,j);
		scanf("%d",&S[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(S[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(S[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER T
else if(array[x]=='T'){
    entry=0;
       printf("Character to Draw");
            n=19;
            int T[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position T[%d][%d]:",i,j);
		scanf("%d",&T[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(T[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(T[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER U
else if(array[x]=='U'){
    entry=0;
       printf("Character to Draw");
            n=20;
            int U[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position U[%d][%d]:",i,j);
		scanf("%d",&U[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(U[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(U[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER V
else if(array[x]=='V'){
    entry=0;
       printf("Character to Draw");
            n=21;
            int V[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position V[%d][%d]:",i,j);
		scanf("%d",&V[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(V[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(V[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER W
else if(array[x]=='W'){
    entry=0;
       printf("Character to Draw");
            n=22;
            int W[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position W[%d][%d]:",i,j);
		scanf("%d",&W[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(W[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(W[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER X
else if(array[x]=='X'){
    entry=0;
       printf("Character to Draw");
            n=23;
            int X[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position X[%d][%d]:",i,j);
		scanf("%d",&X[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(X[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(X[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER Y
else if(array[x]=='Y'){
    entry=0;
       printf("Character to Draw");
            n=24;
            int Y[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position Y[%d][%d]:",i,j);
		scanf("%d",&Y[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(Y[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(Y[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//LETTER Z
else if(array[x]=='Z'){
    entry=0;
       printf("Character to Draw");
            n=25;
            int Z[7][5];
               printf("\n%s\n",&guide[n].letter);
            for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		printf("Enter 0 or 1 in position Z[%d][%d]:",i,j);
		scanf("%d",&Z[i][j]);
		fflush(stdin);
		}
		printf("\nEnter next row\n");
	}
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
		if(Z[i][j]==guide[n].position[i][j]){
            entry++;
		 }
		}
	}
	//MARKS
	printf("%f correct entries\n",entry);
	score=(entry/35)*100;
    sum+=score;
	printf("your score is %f\n",score);
	printf("Your character\n");
	for(i=0;i<7;i++){
		for(j=0;j<5;j++){
            if(Z[i][j]==1){
                       printf("*");
                }
                else{
                    printf(" ");
                }
		}
		printf("\n");
	}
               //printarray
               printf("\ncorrect character\n");
        for(i=0;i<7;i++){
            for(j=0;j<5;j++){
                if(guide[n].position[i][j]==1){
                    printf("*");
                }
                else{
                    printf(" ");
                }
            }
            printf("\n");
        }

}
//END OF FOR LOOP
}
 t=clock()-t;
 double time_taken=((double)t)/CLOCKS_PER_SEC;
 printf("\nYou have used %f seconds",time_taken);
 //string for time
char Time_taken[255];
 sprintf(Time_taken,"%f",time_taken);
    //REMOVE
    average=sum/(strlen(array));
    printf("\n\t\t\t\t\t ******THANK YOU FOR ATTEMPTING*******\n Your average for this assignment is %f%%",average);
    //string to store results sent to database
    char AVERAGE[25];
    char query[255];
    sprintf(AVERAGE,"%.2f",average);
    printf("\n AVERAGE RECORDED:%s%%",AVERAGE);
    //send marks
    conn = mysql_init(NULL);
    conn = mysql_real_connect(conn,"localhost","root","","kindercare_sys",0,NULL,0);
    strcpy(query,"INSERT INTO mark (Usercode,assignmentID,average,ATTEMPT,Duration) VALUES(\'");
    strcat(query,dummy);
    strcat(query,"\',\'");
    strcat(query,index);
    strcat(query,"\',\'");
    strcat(query,AVERAGE);
    strcat(query,"\',\'");
    strcat(query,ATTEMPT);
    strcat(query,"\',\'");
    strcat(query,Time_taken);
    strcat(query,"\')");
    //printf("\n%s",query);
    if(mysql_query(conn,query)){
        //finish_with_error(conn);
        printf("\n\t\t\t\tALREADY ATTEMPTED");
        goto label;
    }
    //SEND MARKS TO DATABASE HERE
     goto label;

    }
    //for activation
    else{
      printf("\t\ttOPPS!YOU NOT ACTIVATED\n");
      printf("============================Go to MENU option:REQUESTACTIVATION============================");
      goto label;
    }
    }
    else if(strcmp(g,choice)==0){
            main();
    }
   // ATTEMPT
    else{
    printf("\tOOPS WRONG COMMAND!TRY AGAIN\n");
        goto label;
    }
     mysql_close(conn);
}
else{
    printf("\t\t\t\t\t\INVALID USERCODE!PLEASE ENTER VALID USERCODE");
    main();
}
}

