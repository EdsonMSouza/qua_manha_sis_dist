public class Main {

	public static void main(String args[]) {
		Valores valor = new Valores();
		System.out.println("Processadores: " + Runtime.getRuntime().availableProcessors());
		System.out.println("Iniciando as Threads: Produtor e Consumidor\n");

        // criando as Threads principais
        new Thread(new Produtor(valor)).start();
        new Thread(new Consumidor(valor)).start();
    }
}
