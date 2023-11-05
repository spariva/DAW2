from django.shortcuts import HttpResponse, HttpResponseRedirect, render, get_object_or_404
from django.urls import reverse

# importamos los modelos para poder hacer busquedas de un objeto en una vista como detalle o en el indice para listar x número de objectos
from .models import Question, Choice

# Create your views here.


def index(request):
    # Para recuperar todos los objetos usamos .all
    # question_list = Question.objects.all()
    # Para recuperar ordernados por algun campo usamso .order_by("campo")
    question_list = Question.objects.order_by("-pub_date")[:5]
    return render(request, 'polls/index.html', {
        "title": "Preguntas",
        "question_list": question_list
    })


def details(request, id):
    # recuperamos mediante un id un objeto y si no existiera devolvemos un error 404
    question = get_object_or_404(Question, id=id)
    return render(request, 'polls/details.html', {
        "question": question
    })


def results(request, id):
    question = get_object_or_404(Question, id=id)
    return render(request, 'polls/results.html', {
        "question": question
    })


def vote(request, id):
    question = get_object_or_404(Question, id=id)

    try:
        # comprobamos que se ha seleccionado una opoción y que esta existe como opción de la pregunta
        selected_choice = question.choice_set.get(id=request.POST['choice'])
    except:
        # si no existe volvemos al formulario y pasamos por contexto que un error que avisa que no ha seleccionado ninguna opcion
        return render(request, 'polls/details.html', {
            "question": question,
            "error": "No has seleccionado ninguna opción"
        })
    else:
        # si existe sumamos 1 a los votos y lo guardamos y redirigimos a la pagina de los resultados mediante httpresponseredirect para que si vuelve a la pagina del formulario no se quede registrado el post que ya habia mandado
        selected_choice.votes += 1
        selected_choice.save()

        return HttpResponseRedirect(reverse('polls:results', args=(question.id,)))
