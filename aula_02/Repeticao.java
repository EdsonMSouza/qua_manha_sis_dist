/**
 * @author Edson Melo de Souza
 */
public class Repeticao {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // declara a variável soma
    	long soma = 0;

        // registra o tempo antes do início do laço
    	long tempoInicial = System.currentTimeMillis();

        /**
         * Código que realiza 1000 iterações, somando-as e mostrando o tempo final gasto no processamento
         */
        for (int i = 0; i < 1000; i++) {
        	soma += i;
        	System.out.println(i + "\t" + soma + "\t" + System.currentTimeMillis());
        }

        // armazena o tempo atual
        long tempoFinal = System.currentTimeMillis();
        
        // mostra os resultados
        System.out.println("Total:\t\t" + soma);
        System.out.println("Tempo:\t\t" + (tempoFinal - tempoInicial) + " ms");
    }
}