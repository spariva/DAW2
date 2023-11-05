from django.db import models

# Create your models here.


class Linea(models.Model):
    nombre = models.CharField(max_length=50)
    color = models.CharField(max_length=30)
    distancia = models.IntegerField(default=0)

    def __str__(self):
        return self.nombre


class Estacion(models.Model):
    nombre = models.CharField(max_length=50)
    linea = models.ForeignKey(Linea, on_delete=models.CASCADE)

    def __str__(self):
        return self.nombre


class Incidencia(models.Model):
    texto = models.TextField()
    fecha = models.DateTimeField()
    estacion = models.ForeignKey(Estacion, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.estacion.nombre} ({self.estacion.linea.nombre}) {self.texto}"
