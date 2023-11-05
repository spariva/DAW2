from django.db import models

# Hacemos primero migrate y luego creamos los modelos de la applicacion, después de hacer los modelos habrá que añadir en el settings.py <<app>>.apps.<<App>>Config
# Después ejecutamos "makemigrations <<app>>"
# Ahora habrá que ejecutar "python manage.py migrate" para que se creen las tablas en la base de datos


class Question(models.Model):
    question_text = models.CharField(max_length=50)
    pub_date = models.DateTimeField(
        'date published', auto_now=False, auto_now_add=False)

    # definimos una funcion dentro de cada modelo que devolvera en la vista de admin el nombre
    def __str__(self):
        return self.question_text


class Choice(models.Model):
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    choice_text = models.CharField(max_length=50)
    votes = models.IntegerField(default=0)

    # definimos una funcion dentro de cada modelo que devolvera en la vista de admin el nombre
    def __str__(self):
        return self.choice_text
