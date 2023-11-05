from django.shortcuts import render, get_object_or_404, HttpResponse, HttpResponseRedirect
from django.urls import reverse

from django.utils import timezone

from .models import Linea, Estacion, Incidencia
# Create your views here.


def index(request):
    lineas = Linea.objects.all()

    msg = ""
    if (request.GET):
        msg = request.GET['msg']

    return render(request, 'incidencias/listado.html', {
        'title': 'Listado',
        'lineas': lineas,
        'msg': msg
    })


def incidencia(request, id):
    estacion = get_object_or_404(Estacion, id=id)

    error = ""
    if (request.GET):
        error = request.GET['error']

    return render(request, 'incidencias/incidencia.html', {
        'title': 'Incidencia',
        'estacion': estacion,
        'error': error
    })


def mandar(request, id):

    try:
        estacion = Estacion.objects.get(id=id)

    except:
        return HttpResponseRedirect("/listado?msg=Error no se ha podido dar de alta su incidencia")

    else:

        if (request.POST['incidencia'] == ""):
            return HttpResponseRedirect(f"/incidencia/{estacion.id}?error=El campo no puede estar vacio")
        else:
            incidencia = Incidencia(
                texto=request.POST['incidencia'],
                fecha=timezone.now(),
                estacion=estacion)

            incidencia.save()

            return HttpResponseRedirect("/listado?msg=Su incidencia ha sido dada de alta")
        # return HttpResponseRedirect(reverse('incidencias:index'))

        # render(request, 'incidencias/listado.html', {
        #     'exito': 'Su incidencia ha sido dada de alta',
        #     'lineas': lineas
        # })
    # estacion = get_object_or_404(Estacion, id=id)

    # return render(request, 'incidencias/incidencia.html', {
    #     'title': 'Incidencia',
    #     'estacion': estacion
    # })
