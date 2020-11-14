package Clases;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the producto database table.
 * 
 */
@Entity
@Table(name="producto")
@NamedQuery(name="Producto.findAll", query="SELECT p FROM Producto p")
public class Producto implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(name="id_pro", unique=true, nullable=false)
	private int idPro;

	@Column(name="cantidad_utilizar")
	private float cantidadUtilizar;

	@Column(length=20)
	private String descripcion;

	@Column(name="id_material")
	private int idMaterial;

	public Producto() {
	}

	public int getIdPro() {
		return this.idPro;
	}

	public void setIdPro(int idPro) {
		this.idPro = idPro;
	}

	public float getCantidadUtilizar() {
		return this.cantidadUtilizar;
	}

	public void setCantidadUtilizar(float cantidadUtilizar) {
		this.cantidadUtilizar = cantidadUtilizar;
	}

	public String getDescripcion() {
		return this.descripcion;
	}

	public void setDescripcion(String descripcion) {
		this.descripcion = descripcion;
	}

	public int getIdMaterial() {
		return this.idMaterial;
	}

	public void setIdMaterial(int idMaterial) {
		this.idMaterial = idMaterial;
	}

}