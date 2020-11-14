package Clases;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the materiales database table.
 * 
 */
@Entity
@Table(name="materiales")
@NamedQuery(name="Materiale.findAll", query="SELECT m FROM Materiale m")
public class Materiale implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_material", unique=true, nullable=false)
	private int idMaterial;

	@Column(name="cantidad_yardas")
	private float cantidadYardas;

	@Column(length=20)
	private String descripcion;

	public Materiale() {
	}

	public int getIdMaterial() {
		return this.idMaterial;
	}

	public void setIdMaterial(int idMaterial) {
		this.idMaterial = idMaterial;
	}

	public float getCantidadYardas() {
		return this.cantidadYardas;
	}

	public void setCantidadYardas(float cantidadYardas) {
		this.cantidadYardas = cantidadYardas;
	}

	public String getDescripcion() {
		return this.descripcion;
	}

	public void setDescripcion(String descripcion) {
		this.descripcion = descripcion;
	}

}