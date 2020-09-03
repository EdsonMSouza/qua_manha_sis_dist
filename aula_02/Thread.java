/**
 * @author Edson Melo de Souza
 */
public class Thread{
    public static void main(String[] args) {
        int nucleos = Runtime.getRuntime().availableProcessors();

        System.out.println();

        // nome da Thread principal
        System.out.println("Thread Principal............: " + Thread.currentThread().getName());
        
        // verifica a quantidade de núcleos do processador
        System.out.println("Nr. de núcleos (Processador): " + nucleos);
        System.out.println();

        // laçode repetição com 5 iterações
        for (int i = 0; i < 6; i++) {
            // cria uma Thread a cada iteração
            new Thread("" + i) {
                public void run() {
                  // executa a ação
                  System.out.println("Thread......................: " + getName() + " executando");
                }
            }.start();
        }
    }
}