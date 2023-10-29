from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column,String,Integer
from sqlalchemy import create_engine
from sqlalchemy.orm import sessionmaker

engine = create_engine("sqlite:///:memory:", echo=True)

Base = declarative_base()



class User(Base):
    __tablename__ = 'users'
    id = Column(Integer, primary_key = True)
    name = Column(String)
    email = Column(String)
    password = Column(String)
    data = Column(ARRAY(String))

def __repr__(self):
    return "<User(name='%s', email='%s', password='%s',selfdata='%s')>" % (
        self.name,
        self.email,
        self.password,
        self.data
    )

Base.metadata.create_all(engine)
    
