public class Valores {

    int valor;
    private boolean bloqueado;

    public Valores() {
        bloqueado = false;
    }

    public synchronized void guardar(int valores) {
        while (bloqueado) {
            try {
                wait();
            } catch (InterruptedException e) {
                System.out.println("Valores-Guardar (ERRO): " + e.getMessage());
            }
        }
        this.valor = valores;
        bloqueado = true;
        notify();
    }

    public synchronized int exibir() {
        while (!bloqueado) {
            try {
                wait();
            } catch (InterruptedException e) {
                System.out.println("Valores-Exibir (ERRO): " + e.getMessage());
            }
        }
        bloqueado = false;
        notify();
        return this.valor;
    }
}
