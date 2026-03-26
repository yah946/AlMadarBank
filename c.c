#include <stdio.h>
int main()
{
  const int x = 10;
  int *y = (int*) &x;
  *y = 20;
  printf("%d",x);
}
