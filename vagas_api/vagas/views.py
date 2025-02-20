from django.shortcuts import render

# Create your views here.

from rest_framework import viewsets
from .models import Vaga
from .serializers import VagaSerializer

class VagaViewSet(viewsets.ModelViewSet):
    queryset = Vaga.objects.all()
    serializer_class = VagaSerializer
