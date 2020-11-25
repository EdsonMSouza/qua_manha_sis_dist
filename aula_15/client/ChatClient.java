import java.io.*;
import java.net.*;

public class ChatClient{
	private String hostname;
	private int port;
	private String userName;

	public ChatClient(String hostname, int port){
		this.hostname = hostname;
		this.port = port;
	}

	public void execute(){
		try{
			Socket socket = new Socket(hostname, port);
			System.out.println("Connected to the chat server");

			// instanciar as Threads
			new ReadThread(socket, this).start();
			new WriteThread(socket, this).start();

		}catch(UnknownHostException ex){ // remoto
			System.out.println("Server not found: " + ex.getMessage());
		}catch(IOException ex){ // local
			System.out.println("I/O Error: " + ex.getMessage());
		}
	}

	void setUserName(String userName){
		this.userName = userName;
	}

	String getUserName(){
		return this.userName;
	}

	// Na execução devemos informar o host e a porta
	public static void main(String[] args){
		// se a entrada for menor que tamanho 2, sai
		if(args.length < 2) return;

		// pega o primeiro parâmetro na linha de comando
		String hostname = args[0]; 

		// pega o segundo parâmetro na linha de comando
		int port = Integer.parseInt(args[1]);

		ChatClient client = new ChatClient(hostname, port);
		client.execute(); // coloca o chat em execução
	}
}