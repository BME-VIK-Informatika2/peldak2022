#define _CRT_SECURE_NO_WARNINGS
#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#define _WINSOCK_DEPRECATED_NO_WARNINGS
#include <winsock2.h>

int main(int argc, char* argv[])
{
	// Ellenõrzés
	if (argc < 5)
	{
		printf("Használat: %s IP port oldal fájl\n", argv[0]);
		return 1;
	}

	// Winsock inicializálás
	WSADATA	wsd;
	if (WSAStartup(0x0202, &wsd) != 0)
	{
		perror("WSAStartup");
		return 1;
	}

	// TCP socket létrehozás
	SOCKET sock;
	if ((sock = socket(PF_INET, SOCK_STREAM, 0)) < 0)
	{
		printf("Socket: %d\r\n", WSAGetLastError());
		return 1;
	}
	// szerver címének összeállítása

	struct sockaddr_in addr;
	addr.sin_family = AF_INET;
	addr.sin_addr.s_addr = inet_addr(argv[1]);
	addr.sin_port = htons(atoi(argv[2]));

	//kapcsolodás a szerverhez

	if (connect(sock, (struct sockaddr*)&addr, sizeof(addr)) < 0)
	{
		printf("connect %d\r\n", WSAGetLastError());
		return 1;
	}

	//HTTP kommunuikáció kérés összeállítása

	char request[256];
	int reqlen;
	reqlen=sprintf(request, "GET %s HTTP/1.0\r\n\r\n", argv[3]);
	//Kérés elküldése
	send(sock, request, reqlen, 0);
	//válasz fogadása
	char recieved[1024];
	int recvlen;
	recvlen = recv(sock, recieved, sizeof(recieved) - 1, MSG_WAITALL);
	if (recvlen < 0)
	{
		printf("recv: %d\r\n", WSAGetLastError());
		return 1;
	}
	recieved[recvlen] = 0;
	printf("Tartalom: %s\n", recieved);

	//Válasz ellenőrzése

	char version[16];
	int status;
	char error[256];
	if (sscanf(recieved, "HTTP/%16s %d %256[^\r\n]\r\n", version, &status, error) == 3)
	{
		printf("A szerver statusz jelzese %d %s\n", status, error);
	}
	// Body megkeresése
	char* pdata;
	if ((pdata = strstr(recieved, "\r\n\r\n")) == NULL)
	{
		printf("Hiba!");
		return 1;
	}


	//Mentés állományba

	FILE* f;
	f = fopen(argv[4], "w");
	if (f == NULL)
	{
		perror("fopen");
		return 1;
	}

	fwrite(pdata + 4, 1, recvlen - (pdata - recieved) - 4, f);

	while ((recvlen = recv(sock, recieved, sizeof(recieved), 0)) > 0)
	{
		fwrite(recieved, 1, recvlen, f);
	}
	fclose(f);

	//socket bezárása
	closesocket(sock);

	WSACleanup();

	return 0;
}