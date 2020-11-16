from django.db import models

# Create your models here.

class origen(models.Model):
    descripcion = models.CharField(max_length=50)
    def __str__(self):
        return self.descripcion

class sexo(models.Model):
    descripcion = models.CharField(max_length=1)
    def __str__(self):
        return self.descripcion

class RegistrarVisita(models.Model):
    Nombre = models.CharField(max_length=50)
    Apellido = models.CharField(max_length=50)
    Edad = models.IntegerField()
    Sexo = models.ForeignKey(sexo, on_delete=models.CASCADE)
    Origen = models.ForeignKey(origen,on_delete=models.CASCADE)
    Pais = models.CharField(max_length=50, verbose_name="País o Departamento")
    Documento = models.CharField(max_length=50, verbose_name="Pasaporte o DPI")
    Fecha= models.DateField(verbose_name="Fecha de visita")
    Tarifa = models.FloatField()

    def __str__(self):
        return '%s %s' % (self.Nombre, self.Apellido)


class actividade(models.Model):
    descripcion=models.CharField(max_length=50)
    def __str__(self):
        return self.descripcion

class RegistrarActividade(models.Model):
    visitante = models.ForeignKey(RegistrarVisita, on_delete=models.CASCADE)
    actividad = models.ForeignKey(actividade, on_delete=models.CASCADE)