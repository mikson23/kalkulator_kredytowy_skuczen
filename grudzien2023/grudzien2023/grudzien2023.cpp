#include <iostream>
#include <fstream>
#include <string>


using namespace std;
const int N = 2000;


int stos(int a, int b) {
    
    if (a > b)
    {
        return 0;
    }
    if (2 * a == b) {
        return 1;
    }else if (2*a+1 == b)
    {
        return 1;
    }else if(stos(2 * a, b) == 1)
    {
         return stos(2 * a, b);
    }else
    {
        return stos(2 * a + 1, b);
    }
    
}



int main()
{
    ifstream we("pary.txt");
    int z = 0;
    
    int A[N] = {};
    while (!we.eof()) {
        we >> A[z];
        z++;
    }
    we.close();
    
    for (int i = 0; i < 1999; i = i + 2)
    {
        if (stos(A[i], A[i+1]) == 1)
        {
            cout << A[i] << " " << A[i + 1] << endl;
        }
    }

    
}
