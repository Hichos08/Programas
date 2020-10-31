from django.db import models

# Create your models here.
class TipoPersona(models.Model):
    descripcion = models.CharField(max_length=100)
    def __str__(self):
        return self.descripcion

class Persona(models.Model):
    tipo_persona = models.ForeignKey(TipoPersona,on_delete=models.CASCADE)
    nombre = models.CharField(max_length=100)
    apellido = models.CharField(max_length=100)

    def __str__(self):
        return self.nombre