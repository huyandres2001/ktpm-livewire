#include<iostream>
using namespace std;
struct node {
int value;
node* next;
};

node* OddList(node* list){
    while(list->value % 2 == 0) list = list->next;
    node* traverse = list;
    while(traverse != NULL){
        while(traverse->next->value % 2 == 0){
            traverse->next = traverse->next->next;
        }
        traverse = traverse->next;
    }
}
