from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import VagaViewSet
from django.contrib import admin
from django.urls import path, include

router = DefaultRouter()
router.register(r'vagas', VagaViewSet)

urlpatterns = [
    path('', include(router.urls)),   
]
