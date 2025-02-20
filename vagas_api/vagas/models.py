from django.db import models

# Create your models here.

from django.db import models

class Vaga(models.Model):
    titulo = models.CharField(max_length=255)
    empresa = models.CharField(max_length=255)
    descricao = models.TextField()
    salario = models.DecimalField(max_digits=10, decimal_places=2)
    data_publicacao = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.titulo

