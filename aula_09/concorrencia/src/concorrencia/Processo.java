package concorrencia;

public class Processo {
    public static void main(String[] args) {
        Valores valor = new Valores();
        
        System.out.println("Iniciando as Threads: Produtor e Consumidor");
        new Thread(new Produtor(valor)).start();
        new Thread(new Consumidor(valor)).start();
    }
}
