/**
 * @author Edson Melo de Souza
 */
class Tarefa {
  private String tarefa;
  public String tipo;

  // método construtor da classe
  public MinhaTarefa(String tarefa, String tipo) {
    this.tarefa = tarefa;
    this.tipo = tipo;
  }

  // método run()
  public void run() {
    System.out.println();
    System.out.println("O nome da tarefa é: " + tarefa);
    System.out.println("O tipo é..........: " + tipo);
    System.out.println();
  }
}

public class Monotarefa {
  public static void main(String[] args) {
    // instância de uma tarefa
    MinhaTarefa tarefa1 = new MinhaTarefa("Listar", "Produtos");

    // execução da tarefa
    tarefa1.run();
  }
}