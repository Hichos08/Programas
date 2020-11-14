package Clases;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;


@Named
@SessionScoped
public class ControladorMaterial implements Serializable {
	private static final long serialVersionUID = 1L;

	//creamos objeto de la clase
	private Materiale material;
	//creamos el constructor
	ControladorMaterial(){
		material = new Materiale();
	}
	
	@PersistenceContext(unitName = "final_web_2020")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;
	
	/*metodo*/
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(material);//este apunta a nuestro objeto 
	    userTransaction.commit();
	}

	public Materiale getMaterial() {
		return material;
	}

	public void setMaterial(Materiale material) {
		this.material = material;
	}

}



